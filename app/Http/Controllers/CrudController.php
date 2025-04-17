<?php

namespace App\Http\Controllers;


use App\Http\Requests\OfferRequest;
use App\Models\offer;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    public function __construct() {}

    // public function store(){
    //   offer::create([
    //   'name'=>'offer3',
    //   'price' =>'5000',
    //   'details'=>'offer details',
    //   ]);
    // }

    public function create()
    {
        return view('offers.create');
    }

  
public function store(OfferRequest $request)
{
    // $messages = $this ->getMessages();
    // $validator = FacadesValidator::make($request->all(), [
    //     'name' => 'required|max:100|unique:offers,name',
    //     'price' => 'required|numeric',
    //     'details' => 'required',
    // ],$messages);

    // if ($validator->fails()) {
    //     return redirect()->back()
    //         ->withErrors($validator)
    //         ->withInput();
    // }
    // dd($request);
    offer::create([
        'name_ar' => $request->name_ar,
        'name_en' => $request->name_en,
        'price' => $request->price,
        'details_ar' => $request->details_ar,
        'details_en' => $request->details_en,
    ]);

    return redirect()->back()->with('success', 'Offer created successfully!');
}

// protected function getMessages(){
//     return [
//         'name.required' => __('message.offer_name_required'),
//         'price.required' => 'السعر مطلوب',
//         'price.numeric' => 'السعر يجب أن يكون رقماً',
//         'details.required' => 'تفاصيل العرض مطلوبة',
//     ];
// }

public function getAllOffers(){
    $offers = offer::select('id','price','name_'.LaravelLocalization::getCurrentLocale().' as name',
    'details_'.LaravelLocalization::getCurrentLocale().' as details'
    )->get();
    return view('offers.all', compact('offers'));
}
}
