<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\DocumentUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $document = Document::where('user_id', Auth::id())->firstOrFail();

        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DocumentUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request)
    {
        $document = Document::where('user_id', Auth::id())->firstOrFail();
        
        if($request->hasFile('affidavit_file')){

            $path = Storage::disk('public')->put('document', $request->affidavit_file);
            $name = substr($path, 9);
    
            $document->affidavit_file = $name;
        }

        if($request->hasFile('dni_file')){

            $path = Storage::disk('public')->put('document', $request->dni_file);
            $name = substr($path, 9);
    
            $document->dni_file = $name;
        }

        if($request->hasFile('vacancy_file')){

            $path = Storage::disk('public')->put('document', $request->vacancy_file);
            $name = substr($path, 9);
    
            $document->vacancy_file = $name;
        }

        if($request->hasFile('aditional_file')){

            $path = Storage::disk('public')->put('document', $request->aditional_file);
            $name = substr($path, 9);
    
            $document->aditional_file = $name;
        }

        $document->update();

        return redirect()->route('documents.edit')->with('warning', 'Documento Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {
        $document = Document::where('user_id', Auth::id())->firstOrFail();

        if($request->affidavit_file){
            if (Storage::disk('public')->exists("document/$document->affidavit_file")) {
                Storage::disk('public')->delete("document/$document->affidavit_file");
                $document->affidavit_file = null;
            }
        }

        if($request->dni_file){
            if (Storage::disk('public')->exists("document/$document->dni_file")) {
                Storage::disk('public')->delete("document/$document->dni_file");
                $document->dni_file = null;
            }
        }

        if($request->vacancy_file){
            if (Storage::disk('public')->exists("document/$document->vacancy_file")) {
                Storage::disk('public')->delete("document/$document->vacancy_file");
                $document->vacancy_file = null;
            }
        }

        if($request->aditional_file){
            if (Storage::disk('public')->exists("document/$document->aditional_file")) {
                Storage::disk('public')->delete("document/$document->aditional_file");
                $document->aditional_file = null;
            }
        }

        $document->update();
        
        return redirect()->route('documents.edit')->with('error', 'Documento Eliminado Correctamente');
    }
}
