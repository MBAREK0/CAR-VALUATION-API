<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        return response()->json($voitures);
    }

    public function estimateprix(Request $request)
    {
        $data = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
        ]);

        $similarCars = Voiture::where('marque', $data['marque'])
            ->where('modele', $data['modele'])
            ->where('annee', $data['annee'])
            ->get();

        if ($similarCars->isEmpty()) {
            return response()->json(['message' => 'No similar cars found'], 404);
        }

        $totalPrice = $similarCars->sum('prix');
        $estimatedPrice = $totalPrice / $similarCars->count();

        return response()->json(['estimatedPrice' => $estimatedPrice]);
    }
}
