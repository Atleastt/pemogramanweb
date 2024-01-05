<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    protected $apiUrl = 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/';
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    protected function getCarData()
    {
        $client = new Client();

        $response = $client->get($this->apiUrl.'all-vehicles-model/records?select=model%2Cvclass%2Cyear%2Cid&limit=20');

        return json_decode($response->getBody(), true);
    }

    protected function showCarData($idCar)
    {
        $client = new Client();

        $response = $client->get($this->apiUrl."all-vehicles-model/records?select=model%2Cvclass%2Cyear%2Cid&where=id%3D%22{$idCar}%22");
        return json_decode($response->getBody(), true);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all()->sortByDesc('id')->map(function ($car) {
            return (object) $car->toArray();
        });

        $cars2 = collect($this->getCarData());
        $results = collect($cars2['results']);

        $results = $results->map(function ($item) {
            $user = Auth::user();

            // Cast $item to an object if it's an array
            $item = is_array($item) ? (object)$item : $item;

            if ($user) {
                $item->user_id = $user->id;
            } else {
                $item->user_id = null;
            }

            return $item;
        });

        // Use merge only if both $cars and $results are collections of objects
        $combined = $results->merge($cars);

        return view('cars.index', compact('combined'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|unique:cars',
            'year' => 'required|integer|min:0|max:2024',
            'vclass' => 'required'
        ]);

        $car = Car::create([
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'vclass' => $request->input('vclass'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id >= 1000){
            $car = collect($this->showCarData($id));
            $car = collect($car['results']);
            $car = $car->map(function ($item) {
                $user = Auth::user();
    
                // Cast $item to an object if it's an array
                $item = is_array($item) ? (object)$item : $item;
    
                if ($user) {
                    $item->user_id = $user->id;
                } else {
                    $item->user_id = null;
                }
    
                return $item;
            });
            // dd($car);
        }else{
            $car = Car::find($id);
        }

        if (empty($car)) {
            abort(404);
        }

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);

        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required|integer|min:0|max:2021',
            'vclass' => 'required'
        ]);

        $car = Car::where('id', $id)->update([
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'vclass' => $request->input('vclass'),
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }
}
