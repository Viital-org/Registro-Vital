<?php

namespace App\Contracts;

interface PacienteInterface
{
    public function getNome(): string;

    public function getDataNascimento(): string;

    public function getCep(): string;

    public function getEndereco(): string;

    public function getNumeroCartaoCredito(): string;

    public function getHobbies(): string;

    public function getDoencasCronicas(): string;

    public function getRemediosRegulares(): string;
}