<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocSegActividad;
use App\Models\DocSegGestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentoSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDocumentoSeguimientoActividad(Request $request, $seguimientoId)
    {
        $files = $request->file('files');
        if (!$files) {
            return response()->json(['message' => 'No files uploaded'], 400);
        }
        $savedFiles = [];
        foreach ($files as $file) {
            $documentoSeguimiento = new DocSegActividad();
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('seguimientos_actividad', $filename, 'public');
            $savedFiles[] = [
                'original_name' => $file->getClientOriginalName(),
                'stored_name' => $filename,
                'path' => $path,
            ];
            $documentoSeguimiento->nombre = $filename;
            $documentoSeguimiento->seguimiento_actividad_id = $seguimientoId;
            $documentoSeguimiento->save();
        }
        return response()->json(['message' => 'Files uploaded successfully'], 200);
    }
    public function storeDocumentoSeguimientoGestion(Request $request, $gestionId)
    {
        $files = $request->file('files');
        if (!$files) {
            return response()->json(['message' => 'No files uploaded'], 400);
        }
        $savedFiles = [];
        foreach ($files as $file) {
            $documentoSeguimiento = new DocSegGestion();
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('seguimientos_gestion', $filename, 'public');
            $savedFiles[] = [
                'original_name' => $file->getClientOriginalName(),
                'stored_name' => $filename,
                'path' => $path,
            ];
            $documentoSeguimiento->nombre = $filename;
            $documentoSeguimiento->seguimiento_gestion_id = $gestionId;
            $documentoSeguimiento->save();
        }
        return response()->json(['message' => 'Files uploaded successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
