<?php
namespace Controllers;
class SlotMachineController
{
    public static function play()
    {
        // Symboles et poids
        $symbols_with_weights = [
            '🍋' => 40,
            '🍒' => 30,
            '⭐' => 15,
            '🔔' => 10,
            '💎' => 5,
        ];

        // Table des gains
        $paytable = [
            '🍋🍋🍋' => 40,
            '🍒🍒🍒' => 50,
            '⭐⭐⭐' => 100,
            '🔔🔔🔔' => 150,
            '💎💎💎' => 200,
        ];

        // Générer les rouleaux
        $reels = [
            self::getRandomSymbol($symbols_with_weights),
            self::getRandomSymbol($symbols_with_weights),
            self::getRandomSymbol($symbols_with_weights),
        ];

        // Calculer le gain
        $combination = implode('', $reels);
        $gain = $paytable[$combination] ?? 0;

        // Réponse JSON
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'reels' => $reels,
            'gain' => $gain,
        ]);
    }

    private function getRandomSymbol($weights)
    {
        $rand = mt_rand(1, array_sum($weights));
        foreach ($weights as $symbol => $weight) {
            if ($rand <= $weight) {
                return $symbol;
            }
            $rand -= $weight;
        }
        return null; // Cas improbable
    }
}
