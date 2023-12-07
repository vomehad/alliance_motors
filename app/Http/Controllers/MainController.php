<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAppRequest;
use App\Http\Resources\EmailResource;
use App\Http\Resources\OfficeCollection;
use App\Http\Resources\PersonCollection;
use App\Mail\SampleMail;
use App\Models\Car;
use App\Models\PhoneNumber;
use App\Services\CarService;
use App\Services\DictService;
use App\Services\SiteService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function __construct(
        private DictService $distService,
        private CarService $carService,
        private SiteService $siteService,
    ) {}

    public function getBrands(): Collection
    {
        return $this->distService->getBrandList();
    }

    public function getModels(Request $request): Collection
    {
        return $this->distService->getModelsByBrands($request->query->get('brands'));
    }

    public function getCarList(Request $request): LengthAwarePaginator
    {
        return $this->carService->getAll($request->query->all());
    }

    public function getOneCar(int $id): Car
    {
        return $this->carService->getOneById($id);
    }

    public function getPersons(Request $request): JsonResponse
    {
        $persons = $this->siteService->getPersons($request->query->get('department'));

        return (new PersonCollection($persons))->response()->setStatusCode(Response::HTTP_OK);
    }

    public function getVacancies(): Collection
    {
        return $this->siteService->getVacancies();
    }

    public function getOffices(): JsonResponse
    {
        $offices = $this->siteService->getOffices();
        $resource = new OfficeCollection($offices);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function getAppNumber(): PhoneNumber|Model
    {
        return PhoneNumber::query()->where(['type' => 'app'])->first();
    }

    public function sendMail(NewAppRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();

        /** @var Car $auto */
        $auto = $this->carService->getOneById($id);

//        $fio = "{$data['name']} {$data['family']}";
//        if (Arr::get($data, 'o', false)) {
//            $fio .= " {$data['o']}";
//        }

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

        Mail::to(config('mail.to.address'))->send(new SampleMail($content));

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
