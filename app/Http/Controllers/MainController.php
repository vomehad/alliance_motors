<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewAppRequest;
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
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    private DictService $distService;
    private CarService $carService;
    private SiteService $siteService;

    public function __construct(DictService $distService, CarService $carService, SiteService $siteService)
    {
        $this->distService = $distService;
        $this->carService = $carService;
        $this->siteService = $siteService;
    }

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

    public function getAppNumber(): PhoneNumber|Model
    {
        return PhoneNumber::query()->where(['type' => 'app'])->first();
    }

    public function sendMail(NewAppRequest $request, int $id): string
    {
        /** @var Car $auto */
        $auto = $this->carService->getOneById($id);

        $data = $request->validated();
        $fio = "{$data['name']} {$data['family']}";
        if ($data['o']) {
            $fio .= " {$data['o']}";
        }

        $content = [
            'subject' => 'Заявка  на кредит с сайта',
            'fio' => $fio,
            'number' => $data['number'],
            'brand' => $auto->configuration->model->brand->name,
            'model' => $auto->configuration->model->name,
            'price' => $auto->price,
            'vin' => $auto->vin,
            'link' => env('APP_FRONT_URL') . '/detail/' . $id
        ];

        Mail::to(config('mail.from.address'))->send(new SampleMail($content));

        return "Email has been sent.";
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
            'picture' => $auto->pictures->first()->value('src'),
        ];

//        Mail::to(config('mail.from.address'))->send(new SampleMail($content));

        return view('emails.sample', [
            'content' => $content
        ]);
    }
}
