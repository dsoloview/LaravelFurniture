<?php

namespace App\Http\Controllers\Api\v1;

use App\Contracts\CarsRepositoryContract;
use App\Contracts\FurnitureRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\FurnitureApiRequest;
use App\Http\Resources\FurnitureResource;
use App\Models\Car;
use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{

    public FurnitureRepositoryContract $furnitureRepository;

    public function __construct(FurnitureRepositoryContract $furnitureRepository)
    {
        $this->furnitureRepository = $furnitureRepository;
    }
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $cars = $this->furnitureRepository->all();
        return FurnitureResource::collection($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FurnitureApiRequest $request)
    {
        $newCar = $this->furnitureRepository->create($request->validated());
        if ($newCar) {
            return response()->json([
                'success' => true,
                'car_id' => $newCar->id,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FurnitureApiRequest $request, Furniture $furniture)
    {
        $this->furnitureRepository->update($furniture, $request->validated());

        if ($furniture) {
            return response()->json([
                'success' => true,
                'car_id' => $furniture->id,
            ]);
        }
    }

    public function show(Furniture $furniture)
    {
        $furniture = $this->furnitureRepository->getCar($furniture);
        return FurnitureResource::make($furniture);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy(Furniture $furniture)
    {
        $this->furnitureRepository->delete($furniture);

        return response()->json([
            'success' => true,
        ]);
    }
}
