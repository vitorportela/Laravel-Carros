<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Http\Requests\CarrosFormRequest;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    public function index(Request $request) {
        $carros = Carro::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('carros.index', compact('carros','mensagem'));
    }

    public function buscar(String $busca) {
        $re = '/<span class="card__price-number">(.*?)<span class="after-price-text">|<img.*?src="((.*?)\.jpg).*?/>|<h2 class="card__title ui-title-inner">.*?<a.*?>(.*?)</a>.*?</h2>|<span class="card-list__info">\W(.*?)</';
        $curl = curl_init("https://www.questmultimarcas.com.br/estoque?termo=" . $busca);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);    
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $str = curl_exec($curl);

        if((curl_getinfo($curl)["http_code"])=="200" ){
            curl_close($curl);
            preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);            
            var_dump($matches);
            return $matches;
        }else{
            return curl_getinfo($curl)["http_code"];
            curl_close($curl);
        }
    }

    public function create()
    {
        return view('carros.create');
    }

    public function store(CarrosFormRequest $request)
    {
        $carro = Carro::create($request->all());
        $request->session()->flash('mensagem',"Carro {$carro->id} criado com sucesso {$carro->nome}");
        
        return redirect()->route('carros');
    }

    public function destroy(Request $request){
        Carro::destroy($request->id);
        $request->session()->flash('mensagem',"Carro removido!");
        return redirect()->route('carros');
    }

}
