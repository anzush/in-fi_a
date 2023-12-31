<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tbl_empresas;
use App\Models\tbl_usuarios;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class empresas extends Controller
{
    public function exportPdf()
    {
        $empresas = tbl_empresas::get();
        $pdf = PDF::loadView('pdf.empresas', compact('empresas'))->setPaper('a4', 'landscape');
        return $pdf->download('empresas.pdf');
    }
    public function printPdf()
    {
        $empresas = tbl_empresas::get();
        $pdf = PDF::loadView('pdf.empresas', compact('empresas'))->setPaper('a4', 'landscape');
        return $pdf->stream('empresas.pdf');
    }

    public function create()
    {
        $empresas = tbl_empresas::all();
        return view('Empresas.registrar_empresa', compact('empresas'));
    }
    public function store(Request $request)
    {
        $nit = tbl_empresas::select('nit_empresa')
            ->where('nit_empresa', '=', $request->nit)
            ->exists();
        $email = tbl_empresas::select('email_empresa')
            ->where('email_empresa', '=', $request->e_mail)
            ->exists();
        $email = tbl_empresas::select('email_empresa')
            ->where('email_empresa', '=', $request->e_mail)
            ->exists();

        if ($nit || $email) {
            if ($nit && $email) {
                return redirect()->route('empresas.create')->with('error', 'La empresa ya existe');
            }
            if ($nit) {
                return redirect()->route('empresas.create')->with('error', 'El nit ' . $request->nit . ' ya existe');
            }
            if ($email) {
                return redirect()->route('empresas.create')->with('error', 'El email ' . $request->e_mail . ' ya existe');
            }
        } else {

            $request->validate([
                'nit' => 'required|max:10',
                'nom_empresa' => 'required|max:20',
                'telefono' => 'required|digits_between:5,10|integer',
                'direccion' => 'required|max:30',
                'e_mail' => 'required|max:30|email',
                'nombre' => 'required|max:50',
                'id' => 'max:10',
                'rol' => 'required|max:10',
            ]);
            $empresas = new tbl_empresas();
            $empresas->nit_empresa = $request->nit;
            $empresas->nom_empresa = $request->nom_empresa;
            $empresas->tel_empresa = $request->telefono;
            $empresas->direccion_empresa = $request->direccion;
            $empresas->email_empresa = $request->e_mail;
            $empresas->nombre = $request->nombre;
            $empresas->id = $request->id;
            $empresas->rol = $request->rol;
            $empresas->save();
            return redirect()->route('empresas.create')->with('guardado', 'La Empresa ha sido guardada con exito');;
        }
    }
    // Retorno de tablas y selact
    public function index()
    {
        $empresas = tbl_empresas::all();

        return view('Empresas.empresas', compact('empresas'));
    }



    public function edit($empresa)
    {
        $usuarios = tbl_usuarios::all();
        $empresa = tbl_empresas::find($empresa);
        return view('Empresas.editar_empresa', compact('empresa', 'usuarios'));
    }

    public function update(Request $request, tbl_empresas $empresa)
    {

        // $empre = tbl_empresas::select('nit_empresa', 'email_empresa')
        //     ->where('id', '!=', $request->empresa)
        //     ->get();
        // // 987456321 jecatro648@misena.edu.co
        // $nit_empresa = $empresa::select('nit_empresa')
        //     ->where('id', '!=', $request->empresa)
        //     ->where('nit_empresa', '=', $request->nit)
        //     ->count();

        // $email = $empresa::select('email_empresa')
        //     ->where('id', '!=', $request->empresa)
        //     ->where('email_empresa', '=', $request->e_mail)
        //     ->count();
        // if ($nit_empresa > 0 || $email > 0) {
        //     if ($nit_empresa > 0 && $email) {
        //         $info = 'El nit y el email, ya está en uso.';
        //         return redirect()->route('empresas.index')->with('error', $info);
        //         die();
        //     }
        //     if ($nit_empresa > 0) {
        //         $info = 'El nit ' . $request->nit . ' ya está en uso.';
        //         return redirect()->route('empresas.index')->with('error', $info);
        //         die();
        //     }

        //     if ($email > 0) {
        //         $info = 'El email ' . $request->email . ' ya está en uso.';
        //         return redirect()->route('empresas.index')->with('error', $info);
        //         die();
        //     }
        // }

        $request->validate([
            'nit' => 'required|max:10',
            'nombre' => 'required|max:20',
            'telefono' => 'required|digits_between:5,10|integer',
            'direccion' => 'required|max:30',
            'e_mail' => 'required|max:30|email',
        ]);
        $empresa = tbl_empresas::find($empresa->id);
        $empresa->nit_empresa = $request->nit;
        $empresa->nom_empresa = $request->nombre;
        $empresa->tel_empresa = $request->telefono;
        $empresa->direccion_empresa = $request->direccion;
        $empresa->email_empresa = $request->e_mail;
        $empresa->rol = $request->rol;
        $empresa->nombre = $request->representante;
        $empresa->save();
        return redirect()->route('empresas.index')->with('actualizado', 'Usuario actualizado');
        return view('Articulos.editar_articulo', compact('articulo'));
    }

    public function destroy(tbl_empresas $empresa)
    {
        $empresa->delete();
        return back()->with('destroy', 'Empresa eliminada correctamente');
    }
}
