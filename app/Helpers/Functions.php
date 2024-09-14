<?php

function validateAndFormatCNPJ(string $cnpj): bool|string
{
    // Remove caracteres não numéricos
    $cnpj = preg_replace('/\D/', '', $cnpj);

    // Verifica se tem 14 dígitos
    if (strlen($cnpj) != 14) {
        return false;
    }

    // CNPJ padrão (todos os dígitos iguais) é inválido
    if (preg_match('/^(\d)\1{13}$/', $cnpj)) {
        return false;
    }

    // Valida os dígitos verificadores
    $soma1 = 0;
    $soma2 = 0;
    $peso1 = 5;
    $peso2 = 6;

    for ($i = 0; $i < 12; $i++) {
        $soma1 += $cnpj[$i] * $peso1;
        $soma2 += $cnpj[$i] * $peso2;
        $peso1 = $peso1 == 2 ? 9 : $peso1 - 1;
        $peso2 = $peso2 == 2 ? 9 : $peso2 - 1;
    }

    $resto1 = $soma1 % 11;
    $digito1 = ($resto1 < 2) ? 0 : 11 - $resto1;

    $soma2 += $digito1 * 2;
    $resto2 = $soma2 % 11;
    $digito2 = ($resto2 < 2) ? 0 : 11 - $resto2;

    if ($cnpj[12] != $digito1 || $cnpj[13] != $digito2) {
        return false;
    }
    return $cnpj;
}
