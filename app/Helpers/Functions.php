<?php
/**
 * Retira os caracteres que nao sejam numeros
 * @param string $cnpj
 * @return string
 */
function formatCNPJ(string $cnpj): string
{
    return preg_replace('/\D/', '', $cnpj);
}
