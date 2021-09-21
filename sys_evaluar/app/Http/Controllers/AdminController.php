<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titulo;
use App\Models\Periodo;
use App\Models\Jefatura;
use App\Models\Cargo;
use App\Models\Pregunta;
use App\Models\Persona;
use App\Models\Evalua;
use App\Models\Punto;
use Illuminate\Support\Facades\Date;

class AdminController extends Controller
{
    // HOME - Sobre nosotros - Cómo funciona
    public function showHome()
    {
        return view('home');
    }

    public function showAbout()
    {
        return view('about');
    }

    //*** TÍTULOS */

    public function showTitulos()
    {
        $titulos = Titulo::orderBy('descrip', 'asc')->get();
        return view("/admin/titulos", [
            "titulos" => $titulos,
        ]);
    }

    public function showTitCreate()
    {
        return view("/admin/titCreate");
    }

    public function showTitEdit($id)
    {
        //        $titulo = Titulo::find($id);
        //        return view('/admin/titEdit', ['titulo' => $titulo]);
        return view("/admin/titEdit", [
            "titulo" => Titulo::find($id)
        ]);
    }

    public function createTit(Request $request, Titulo $titulo)
    {
        $request->validate(Titulo::$rules, Titulo::$customMessages);
        Titulo::create($request->all()); // Guarda en la BD.
        return redirect('/admin/titulos')->with('mensaje', "El título $request->descrip fue creado exitosamente.");
    }

    public function editTit(Request $request, $id)
    {
        $request->validate(Titulo::$rules, Titulo::$customMessages);
        $titulo = Titulo::find($id);
        $tituloant = $titulo->descrip;
        $titulo->descrip = $request->descrip;
        $titulo->save();
        return redirect('/admin/titulos')->with('mensaje', "El título $tituloant fue actualizado exitosamente.");
    }

    public function deleteTit(Request $request, $id)
    {
        $titulo = Titulo::find($id);
        $tituloname = $titulo->descrip;
        $titulo = Titulo::find($id)->delete();
        //        $titulo->delete();
        return redirect('/admin/titulos')->with('mensaje', "El título $tituloname fue eliminado exitosamente.");
    }

    // PERIODOS

    public function showPeriodos()
    {
        $periodos = Periodo::orderBy('descrip', 'asc')->get();
        return view("/admin/periodos", [
            "periodos" => $periodos,
        ]);
    }

    public function showPeriodoCreate()
    {
        return view("/admin/periodoCreate");
    }

    public function showPeriodoEdit($id)
    {
        return view("/admin/periodoEdit", [
            "periodo" => Periodo::find($id)
        ]);
    }

    public function createPeriodo(Request $request, Periodo $periodo)
    {
        $request->validate(Periodo::$rules, Periodo::$customMessages);
        Periodo::create($request->all()); // Guarda en la BD.
        return redirect('/admin/periodos')->with('mensaje', "El período $request->descrip fue creado exitosamente.");
    }

    public function editPeriodo(Request $request, $id)
    {
        $request->validate(Periodo::$rules, Periodo::$customMessages);
        $periodo = Periodo::find($id);
        $periodo->descrip = $request->descrip;
        $periodo->save();
        return redirect('/admin/titulos')->with('mensaje', "El título $periodo->descrip fue actualizado exitosamente.");
    }

    public function deletePeriodo(Request $request, $id)
    {
        $periodo = Periodo::find($id);
        $periodoName = $periodo->descrip; // Se guarda el nombre del período, para mostrarlo después.
        $periodo = Periodo::find($id)->delete();
        return redirect('/admin/titulos')->with('mensaje', "El período $periodoName fue eliminado exitosamente.");
    }

    // JEFATURAS EVALUADORES
    public function showJefaturas()
    {
        $jefaturas = Jefatura::orderBy('descrip', 'asc')->get();
        return view("/admin/jefaturas", [
            "jefaturas" => $jefaturas,
        ]);
    }

    public function showJefaturaCreate()
    {
        return view("/admin/jefaCreate");
    }

    public function showJefaturaEdit($id)
    {
        return view("/admin/jefaEdit", [
            "jefatura" => Jefatura::find($id)
        ]);
    }

    public function createJefatura(Request $request, Jefatura $jefatura)
    {
        $request->validate(Jefatura::$rules, Jefatura::$customMessages);
        Jefatura::create($request->all()); // Guarda en la BD.
        return redirect('/admin/evaluadores')->with('mensaje', "El evaluador $request->descrip fue creado exitosamente.");
    }

    public function editJefatura(Request $request, $id)
    {
        $request->validate(Jefatura::$rules, Jefatura::$customMessages);
        $jefatura = Jefatura::find($id);
        $jefaturaant = $jefatura->descrip;
        $jefatura->descrip = $request->descrip;
        $jefatura->save();
        return redirect('/admin/evaluadores')->with('mensaje', "El evaluador $jefaturaant fue actualizado exitosamente.");
    }

    public function deleteJefatura(Request $request, $id)
    {
        $jefatura = Jefatura::find($id);
        $jefaturaname = $jefatura->descrip;
        $jefatura = Jefatura::find($id)->delete();
        //        $titulo->delete();
        return redirect('/admin/evaluadores')->with('mensaje', "El evaluador $jefaturaname fue eliminado exitosamente.");
    }


    // CARGOS

    public function showCargos()
    {
        $cargos = Cargo::all();
        return view('/admin/cargos', [
            'cargos' => $cargos
        ]);
    }

    public function showCargoCreate()
    {
        $cargos = Cargo::all();
        $jefaturas = Jefatura::all();
        return view('/admin/cargoCreate', [
            'cargos' => $cargos,
            'jefaturas' => $jefaturas
        ]);
    }

    public function showCargoEdit($id)
    {
        $cargo = Cargo::find($id);
        $jefaturas = Jefatura::all();
        return view('/admin/cargoEdit', [
            'cargo' => $cargo,
            'jefaturas' => $jefaturas
        ]);
    }

    public function createCargo(Request $request)
    {
        $rules = [
            'descrip' => 'required|min:3',
            'jefatura_id' => 'required',
        ];
        $customMessages = [
            'descrip.required' => 'El campo descripción es obligatorio',
            'descrip.min'           => 'El campo descripción debe ser más de 3 caracteres',
            'jefatura_id.required' => 'El campo Jefatura es requerido',
        ];

        $request->validate($rules, $customMessages);
        $cargo = Cargo::create($request->all());
        $cargo->save();
        return redirect('/admin/cargos')->with('mensaje', 'Se ha creado correctamente el cargo: ' . $request->descrip);
    }

    public function editCargo(Request $request, $id)
    {
        $rules = [
            'descrip' => 'required|min:3',
            'jefatura_id' => 'required',
        ];
        $customMessages = [
            'descrip.required' => 'El campo descripción es obligatorio',
            'descrip.min'           => 'El campo debe ser mayor de 3 caracteres',
            'jefatura_id.required' => 'El campo Jefatura es requerido',
        ];

        $request->validate($rules, $customMessages);
        $cargo = Cargo::find($id);
        $cargo->descrip = $request->descrip;
        $cargo->jefatura_id = $request->jefatura_id;
        $cargo->save();
        return redirect('/admin/cargos')->with('mensaje', "El cargo se ha modificado por $cargo->descrip");
    }

    public function deleteCargo($id)
    {
        Cargo::find($id)->delete();
        return redirect('/admin/cargos')->with('mensaje', "El cargo $id  Se ha eliminado correctamente");
    }

    // PREGUNTAS 
    public function showPreguntas()
    {
        $preguntas = Pregunta::all();
        return view('/admin/preguntas', [
            'preguntas' => $preguntas
        ]);
    }

    public function showPreguntaCreate()
    {
        $preguntas = Pregunta::all();
        $titulos = Titulo::all();
        $jefaturas = Jefatura::all();
        return view('/admin/preguntaCreate', [
            'preguntas' => $preguntas,
            'titulos' => $titulos,
            'jefaturas' => $jefaturas
        ]);
    }

    public function showPreguntaEdit($id)
    {
        $pregunta = Pregunta::find($id);
        $titulos = Titulo::all();
        $jefaturas = Jefatura::all();
        return view('/admin/preguntaEdit', [
            'pregunta' => $pregunta,
            'titulos' => $titulos,
            'jefaturas' => $jefaturas
        ]);
    }

    public function createPregunta(Request $request)
    {
        $rules = [
            'descrip' => 'required|min:3',
            'titulo_id' => 'required',
            'jefatura_id' => 'required',
        ];
        $customMessages = [
            'descrip.required' => 'El campo descripción es obligatorio',
            'descrip.min'           => 'El campo descripción debe ser más de 3 caracteres',
            'titulo_id.required' => 'El campo Título es requerido.',
            'jefatura_id.required' => 'El campo Jefatura es requerido',
        ];

        $request->validate($rules, $customMessages);
        $pregunta = Pregunta::create($request->all());
        $pregunta->save();
        return redirect('/admin/preguntas')->with('mensaje', 'Se ha creado correctamente la pregunta: ' . $request->descrip);
    }

    public function editPregunta(Request $request, $id)
    {
        $rules = [
            'descrip' => 'required|min:3',
            'titulo_id' => 'required',
            'jefatura_id' => 'required',
        ];
        $customMessages = [
            'descrip.required' => 'El campo descripción es obligatorio',
            'descrip.min'           => 'El campo debe ser mayor de 3 caracteres',
            'titulo_id.required' => 'El título es requerido.',
            'jefatura_id.required' => 'El campo Jefatura es requerido',
        ];

        $request->validate($rules, $customMessages);
        $pregunta = Pregunta::find($id);
        $pregunta->descrip = $request->descrip;
        $pregunta->titulo_id = $request->titulo_id;
        $pregunta->jefatura_id = $request->jefatura_id;
        $pregunta->save();
        return redirect('/admin/preguntas')->with('mensaje', "La pregunta se ha modificado por $pregunta->descrip");
    }

    public function deletePregunta($id)
    {
        Pregunta::find($id)->delete();
        return redirect('/admin/preguntas')->with('mensaje', "La pregunta con ID nro $id Se ha eliminado correctamente");
    }

    // PERSONAS
    public function showPersonas(Request $request)
    {
        $persoBuilder = Persona::orderBy('persona_doc', 'asc')->get();
        if (isset($request->filtro)) {
            if ($request->filtro == "Documento") {
                $persoBuilder = $persoBuilder->where('persona_doc', $request->descrip);
            } else {
                $persoBuilder = $persoBuilder->where('persona_ape1', $request->descrip);
            }
        }
        //        if (isset($request->descrip)) {
        //            $persoBuilder = $persoBuilder->where('persona_ape1', $request->descrip);
        //        }

        $personas = $persoBuilder;

        //        $personas = Persona::all();
        return view('/admin/personas', [
            'personas' => $personas
        ]);
    }

    public function showPersonaCreate()
    {
        $personas = Persona::all();
        $cargos = Cargo::all();
        $jefaturas = Jefatura::all();
        return view('/admin/personaCreate', [
            'personas' => $personas,
            'cargos' => $cargos,
            'jefaturas' => $jefaturas
        ]);
    }

    public function showPersonaEdit($id)
    {
        $persona = Persona::find($id);
        $cargos = Cargo::all();
        $jefaturas = Jefatura::all();
        return view('/admin/personaEdit', [
            'persona' => $persona,
            'cargos' => $cargos,
            'jefaturas' => $jefaturas
        ]);
    }

    public function createPersona(Request $request)
    {
        $rules = [
            'persona_doc' => 'unique:App\Models\Persona,persona_doc',
            'persona_nom1' => 'required|min:3',
            'persona_ape1' => 'required',
            'cargo_id' => 'required',
        ];
        $customMessages = [
            'persona_doc.unique' => 'Ya existe documento',
            'persona_nom1.required' => 'El campo Nombre es obligatorio',
            'persona_nom1.min'           => 'El campo Nombre debe ser más de 3 caracteres',
            'persona_ape1.required' => 'El campo Apellido es requerido.',
            'cargo_id.required' => 'El campo Cargo es requerido',
        ];

        $request->validate($rules, $customMessages);
        $persona = Persona::create($request->all());
        $persona->save();
        return redirect('/admin/personas')->with('mensaje', 'Se ha creado correctamente la persona: ' . $request->persona_nom1 . " " . $request->persona_ape1);
    }

    public function editPersona(Request $request, $id)
    {
        $rules = [
            'persona_nom1' => 'required|min:3',
            'persona_ape1' => 'required',
            'cargo_id' => 'required',
        ];
        $customMessages = [
            'persona_nom1.required' => 'El campo Nombre es obligatorio',
            'persona_nom1.min'           => 'El campo Nombre debe ser más de 3 caracteres',
            'persona_ape1.required' => 'El campo Apellido es requerido.',
            'cargo_id.required' => 'El campo Cargo es requerido',
        ];

        $request->validate($rules, $customMessages);
        $cargobusco = Cargo::find($request->cargo_id);
        $jefe = Jefatura::find($cargobusco->jefatura_id);
        $persona = Persona::find($id);
        $persona->persona_doc = $request->persona_doc;
        $persona->persona_nom1 = $request->persona_nom1;
        $persona->persona_nom2 = $request->persona_nom2;
        $persona->persona_ape1 = $request->persona_ape1;
        $persona->persona_ape2 = $request->persona_ape2;
        $persona->persona_ingreso = $request->persona_ingreso;
        $persona->persona_nac = $request->persona_nac;
        $persona->persona_genero = $request->persona_genero;
        $persona->cargo_id = $request->cargo_id;
        $persona->jefatura_id = $jefe->id;
        $persona->save();
        return redirect('/admin/personas')->with('mensaje', 'Se ha modificado correctamente la persona: ' . $request->persona_nom1 . " " . $request->persona_ape1);
    }

    // EVALUACIONES

    public function showAutoEvaluacionCons(Request $request)
    {
        if (isset($request->documento)) {
            $datospersona = Persona::where('persona_doc', $request->documento)->get();
            //            $preguntas = Pregunta::where('jefatura_id', $persoid->jefatura_id)->first();
        } else {
            //            $datospersona = Persona::where('persona_doc', 0)->first();
            $datospersona = Persona::where('persona_doc', 0)->get();
        }
        return view('/autoevaluacion', [
            'datospersona' => $datospersona
        ]);
    }

    //showAutoEvalCreate -Ver autoevaluacion y preguntas por grupo
    public function showAutoEvalCreate(Request $request, $documento)
    {
        $periodos = Periodo::all();
        $persona = Persona::where('persona_doc', $documento)->first();
        $titulos = Titulo::all();
        if (isset($request->periodo_id)) {
            $datosautoeval = Evalua::where('persona_id', $persona->id);
            $datosautoeval = $datosautoeval->where('periodo', $request->periodo)->first();
        } else {
            $datosautoeval = Evalua::where('persona_id', $persona->id)->first();
        }
        if (isset($request->titulo_id)) {
            //            $datospreguntas = Pregunta::all();
            $datospreguntas = Pregunta::where('titulo_id', $request->titulo_id)->get();
            //            $datospreguntas = $datospreguntas->where('jefatura_id', $persona->cargo->jefatura_id)->get();
        } else {
            $datospreguntas = Pregunta::where('titulo_id', 0)->get();
        }
        return view('/autoevalCreate', [
            'persona' => $persona,
            'titulos' => $titulos,
            'periodos' => $periodos,
            'datosautoeval' => $datosautoeval,
            'datospreguntas' => $datospreguntas
        ]);
    }

    public function showEvalEdit(Request $request)
    {
        $periodo = $request->periodo;
        $pregunta = Pregunta::find($request->id);
        $persona = Persona::find($request->persona_id);
        $evalua = Evalua::find($request->persona_id);
        $datosautoeval = Evalua::where('persona_id', $request->persona_id);
        $datosautoeval = $datosautoeval->where('periodo', $request->periodo);
        $datosautoeval = $datosautoeval->where('pregunta_id', $request->id)->first();
        return view('/autoevaleditModif', [
            'datosautoeval' => $datosautoeval,
            'pregunta' => $pregunta,
            'persona' => $persona,
            'evalua' => $evalua,
            'periodo' => $periodo
        ]);
    }

    //editAutoevaluacion

    public function editAutoevaluacion(Request $request)
    {
        $rules = [
            'persona_id' => 'required',
            'puntos' => 'required|between:1,5',
        ];
        $customMessages = [
            'persona_id.required' => 'El campo Id persona es obligatorio',
            'puntos.required'     => 'El campo puntaje es requerido.',
            'puntos.between'      => 'El campo puntaje debe ser entre 1 y 5.',
        ];
        $request->validate($rules, $customMessages);
        $persona = Persona::find($request->persona_id);
        $pregunta = Pregunta::find($request->id);
        $evalua = new Evalua;
        $evalua->fecha = $request->FechaActual;
        $evalua->persona_id = $request->persona_id;
        $evalua->jefatura_id = $persona->cargo->jefatura_id;
        $evalua->titulo_id = 0;
        $evalua->puntos = $request->puntos;
        $evalua->pregunta_id = $request->id;
        $evalua->periodo = $request->periodo;
        $evalua->confirmado = 1;
        $evalua->save();

        //        $evalua = Evalua::create($request->all());
        //        $evalua->save();

        //        $evaluas = Evalua::updateOrCreate(
        //            ['persona_id' => $personabusco->id, 'periodo' => $request->periodo, 'pregunta_id' => $id],
        //            ['puntos' => $request->puntaje]
        //        );

        return redirect('/autoevaluacion/' . $request->documento . '/crear')->with('mensaje', 'Se ha cargado el puntaje correctamente.');
    }
}
