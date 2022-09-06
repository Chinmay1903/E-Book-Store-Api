<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EStoreDataRequest;
use App\Http\Resources\EStoreDataResource;
use App\Models\EStoreData;
use Illuminate\Http\Request;

class EStoreDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->input(key:'page', default:1);
        $size = $request->input(key:'max_size', default:20); 
        if($s = $request->input(key:'s')){
            $books = EStoreData::select('id', 'title', 'author', 'genre', 'description', 'isbn', 'image', 'published', 'publisher')->whereRaw(sql:"title LIKE '%" . $s ."%'")->orwhereRaw(sql:"description LIKE '%" . $s ."%'")->orwhereRaw(sql:"publisher LIKE '%" . $s ."%'")->orwhereRaw(sql:"genre LIKE '%" . $s ."%'")->orwhereRaw(sql:"isbn LIKE '%" . $s ."%'")->orwhereRaw(sql:"author LIKE '%" . $s ."%'")->orwhereRaw(sql:"published LIKE '%" . $s ."%'")->paginate($size); 
            $total = EStoreData::select('id', 'title', 'author', 'genre', 'description', 'isbn', 'image', 'published', 'publisher')->whereRaw(sql:"title LIKE '%" . $s ."%'")->orwhereRaw(sql:"description LIKE '%" . $s ."%'")->orwhereRaw(sql:"publisher LIKE '%" . $s ."%'")->orwhereRaw(sql:"genre LIKE '%" . $s ."%'")->orwhereRaw(sql:"isbn LIKE '%" . $s ."%'")->orwhereRaw(sql:"author LIKE '%" . $s ."%'")->orwhereRaw(sql:"published LIKE '%" . $s ."%'")->count();
        }else{
            $books = EStoreData::select('id', 'title', 'author', 'genre', 'description', 'isbn', 'image', 'published', 'publisher')->paginate($size); 
            $total = EStoreData::select('id', 'title', 'author', 'genre', 'description', 'isbn', 'image', 'published', 'publisher')->count();
        }
        $result = EStoreDataResource::collection($books);
        return [
            'page'=> $page,
            'max_size'=>$size,
            'total'=>$total,
            'total_pages'=>ceil(num:$total/$size),
            'data'=>$result
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $books = EStoreData::create($request->all());
        
        return new EStoreDataResource($books);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EStoreData  $eStoreData
     * @return \Illuminate\Http\Response
     */
    public function show($id, EStoreData $eStoreData)
    {
        $book = EStoreData::findOrFail($id);
        return new EStoreDataResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EStoreData  $eStoreData
     * @return \Illuminate\Http\Response
     */
    public function edit(EStoreData $eStoreData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EStoreData  $eStoreData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EStoreData $eStoreData)
    {
        $eStoreData->update($request->all());
        
        return new EStoreDataResource($eStoreData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EStoreData  $eStoreData
     * @return \Illuminate\Http\Response
     */
    public function destroy(EStoreData $eStoreData)
    {
        $eStoreData->delete();

        return response(null, 204);
    }
}
