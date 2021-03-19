<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etapa;
use App\Models\Candidato;

class WelcomeController extends Controller
{
    public function index() {
        $etapa = null;
        $quantPessoasCadastradas = 0;
        $quantPessoasPriDose = 0;
        $quantPessoasSegDose = 0;

        $etapa = Etapa::where('atual', true)->first();

        $etapas = Etapa::all();
        if ($etapas != null) {
            foreach ($etapas as $etapa) {
                $quantPessoasPriDose += $etapa->total_pessoas_vacinadas_pri_dose;
                $quantPessoasSegDose += $etapa->total_pessoas_vacinadas_seg_dose;
            }
        }

        $quantPessoasCadastradas = count(Candidato::all());

        return view('welcome')->with(['etapa'                   => $etapa,
                                      'quantPessoasCadastradas' => $quantPessoasCadastradas,
                                      'quantPessoasPriDose'     => $quantPessoasPriDose,
                                      'quantPessoasSegDose'     => $quantPessoasSegDose]);
    }
}
