<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArchivoVerificacion;
use App\Models\DocumentoVerificacion;
use App\Models\MetaDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentosVerificacionController extends Controller
{
    public function index()
    {
        //
    }
    public function store(Request $request)
    {
        $documentoVerificacion = new DocumentoVerificacion();
        $documentoVerificacion->descripcion = $request->descripcion;
        $documentoVerificacion->operacion_id = $request->operacionId;
        $documentoVerificacion->unidad_id = $request->unidadId;
        $documentoVerificacion->save();
        $metaDocumento = new MetaDocumento();
        $metaDocumento->meta = $request->meta;
        $metaDocumento->periodo = $request->periodo;
        $metaDocumento->documento_verificacion_id = $documentoVerificacion->id;
        $metaDocumento->save();
    }
    public function archivosVerificacion(Request $request, $docVerificacionId)
    {
        $files = $request->file('files');
        if (!$files) {
            return response()->json(['message' => 'No files uploaded'], 400);
        }
        $savedFiles = [];
        foreach ($files as $file) {
            $archivoVerificacion = new ArchivoVerificacion();
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('documentos_verificacion', $filename, 'public');
            $savedFiles[] = [
                'original_name' => $file->getClientOriginalName(),
                'stored_name' => $filename,
                'path' => $path,
            ];
            $archivoVerificacion->nombre = $filename;
            $archivoVerificacion->documento_verificacion_id = $docVerificacionId;
            $archivoVerificacion->save();
        }
        return response()->json(['message' => 'Files uploaded successfully'], 200);
    }
    public function show(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
