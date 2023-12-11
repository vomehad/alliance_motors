<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppRequest;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\TradeInRequest;
use App\Http\Resources\EmailResource;
use App\Mail\ApplicationMail;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function __construct(
        private CarService $carService,
    ) {}

    public function sendMail(AppRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();

        /** @var Car $auto */
        $auto = $this->carService->getOneById($id);

        $content = [
            'subject' => 'Заявка  на кредит с сайта',
            'name' => $data['name'],
            'number' => $data['number'],
            'brand' => $auto->configuration->model->brand->name,
            'model' => $auto->configuration->model->name,
            'price' => $auto->price,
            'vin' => $auto->vin,
            'link' => env('APP_FRONT_URL') . '/detail/' . $id,
            'picture' => $auto->pictures->first()->src,
        ];

        Mail::to(config('mail.to.address'))->send(new ApplicationMail($content, 'application'));

        return (new EmailResource("Email has been sent."))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function sendAppCredit(AppRequest $request): JsonResponse
    {
        $data = $request->validated();

        $content = [
            'subject' => 'Заявка  на кредит с сайта',
            'name' => $data['name'],
            'number' => $data['number'],
        ];

        Mail::to(config('mail.to.address'))->send(new ApplicationMail($content));

        return (new EmailResource("Email has been sent."))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function sendFeedback(FeedbackRequest $request): JsonResponse
    {
        $data = $request->validated();

        $content = [
            'subject' => 'Письмо директору',
            'name' => $data['name'],
            'text' => $data['text'],
        ];

        Mail::to(config('mail.to.address'))->send(new ApplicationMail($content));

        return (new EmailResource("Email has been sent."))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function sendAppTradeIn(TradeInRequest $request): JsonResponse
    {
        $data = $request->validated();

        $content = [
            'subject' => 'Заявка на TradeIn',
            'name' => $data['name'],
            'text' => $data['text'],
        ];

        Mail::to(config('mail.to.address'))->send(new ApplicationMail($content));

        return (new EmailResource("Email has been sent."))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function exampleMail($id)
    {
        /** @var Car $auto */
        $auto = $this->carService->getOneById($id);

        $fio = "Den Mozhaev Nickolaevich";

        $content = [
            'subject' => 'Заявка  на кредит с сайта',
            'name' => $fio,
            'number' => '+7 906 625 48 99',
            'brand' => $auto->configuration->model->brand->name,
            'model' => $auto->configuration->model->name,
            'price' => $auto->price,
            'vin' => $auto->vin,
            'link' => env('APP_FRONT_URL') . '/detail/' . $id,
            'picture' => $auto->pictures->first()->src,
            'text' => 'Доступны только владельцам. Чтобы их получить, нужно зайти в личный кабинет → Документы и данные → Недвижимость. Отобразятся вид и адрес объекта недвижимости, его основные характеристики, права и ограничения, запрет на регистрацию без личного участия и другие сведения '
        ];

//        Mail::to(config('mail.from.address'))->send(new SampleMail($content));

        return view('emails.application', [
            'content' => $content
        ]);
    }
}
