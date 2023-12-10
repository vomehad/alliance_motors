<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAppRequest;
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

    public function sendMail(NewAppRequest $request, int $id): JsonResponse
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

    public function sendAppCredit(NewAppRequest $request): JsonResponse
    {
        $data = $request->validated();

        $content = [
            'subject' => 'Заявка  на кредит с сайта',
            'name' => $data['name'],
            'number' => $data['number'],
        ];

        Mail::to(config('mail.to.address'))->send(new ApplicationMail($content, 'application'));

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
            'fio' => $fio,
            'number' => '+7 906 625 48 99',
            'brand' => $auto->configuration->model->brand->name,
            'model' => $auto->configuration->model->name,
            'price' => $auto->price,
            'vin' => $auto->vin,
            'link' => env('APP_FRONT_URL') . '/detail/' . $id,
            'picture' => $auto->pictures->first()->src,
        ];

//        Mail::to(config('mail.from.address'))->send(new SampleMail($content));

        return view('emails.application', [
            'content' => $content
        ]);
    }
}
