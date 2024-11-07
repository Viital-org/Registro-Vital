<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use App\Models\AtuaArea;
>>>>>>> develop
use App\Models\Especializacao;
use Illuminate\Database\Seeder;

class EspecializacaoSeeder extends Seeder
{
    /**
<<<<<<< HEAD
     * Run the database seeds.
     */
    public function run(): void
    {
        Especializacao::factory(10)->create();
    }
}
=======
     * Execute os seeds da tabela de especializações.
     */
    public function run(): void
    {
        $especializacoesPorArea = [
            'Cardiologia' => [
                'Cardiologia geral',
                'Arritmia e eletrofisiologia',
                'Cardiologia pediátrica',
                'Cardiologia intervencionista',
                'Cardiologia especialista em valvopatias',
                'Cardiologia especialista em transplantes',
                'Cardiologia especialista em miocardiopatias',
            ],
            'Dermatologia' => [
                'Cirurgia',
                'Cosmiatria',
                'Dermatopediatria',
                'Fototerapia',
                'Hansenologia',
                'Oncologia Cutânea',
            ],
            'Endocrinologia' => [
                'Adrenal e Hipertensão',
                'Andrologia',
                'Diabetes',
                'Endocrinologia Feminina',
                'Endocrinologia Pediátrica',
                'Neuroendocrinologia',
                'Obesidade',
                'Tireoide',
            ],
            'Ginecologia' => [
                'Mastologia',
                'Reprodução humana',
                'Medicina fetal',
                'Endoscopia ginecológica',
                'Densitometria óssea',
                'Sexologia',
                'Ultrassonografia em ginecologia e obstetrícia',
                'Citopatologia',
                'Endocrinologia ginecológica',
                'Patologia do trato genital inferior',
            ],
            'Neurologia' => [
                'Mastologia',
                'Reprodução humana',
                'Medicina fetal',
                'Endoscopia ginecológica',
                'Densitometria óssea',
                'Sexologia',
                'Ultrassonografia em ginecologia e obstetrícia',
                'Citopatologia',
                'Endocrinologia ginecológica',
                'Patologia do trato genital inferior',
            ],
            'Oftalmologia' => [
                'Oftalmologia geral',
                'Catarata',
                'Refrativa',
                'Retina e vítreo',
                'Glaucoma',
                'Córnea',
                'Oftalmopediatria',
                'Oftalmoplástica',
                'Doenças da órbita',
                'Estrabismo',
            ],
            'Oncologia' => [
                'Oncologia clínica',
                'Oncologia cirúrgica',
                'Radioterapia',
                'Hematologista-oncologista',
                'Oncologista pediátrico',
                'Oncologista ginecológico',
                'Oncologista dermatológico',
                'Enfermagem em Oncologia',
            ],
            'Ortopedia' => [
                'Ortopedia pediátrica',
                'Ortopedia esportiva',
                'Cirurgia da coluna',
                'Cirurgia da mão',
                'Ortopedia do joelho',
                'Traumatologia',
                'Ortopedia oncológica',
                'Ortopedia de reconstrução e fixador externo',
                'Cirurgia do quadril',
                'Cirurgia do pé e do tornozelo',
            ],
            'Pediatria' => [
                'Nutrologia Pediátrica',
                'Neonatologia',
                'Cardiologia Pediátrica',
                'Endocrinologia Pediátrica',
                'Gastroenterologia Pediátrica',
                'Imunologia Pediátrica',
                'Infectologia Pediátrica',
                'Medicina do Adolescente',
                'Neurologia Pediátrica',
            ],
            'Psiquiatria' => [
                'Psicoterapia',
                'Psicogeriatria',
                'Psiquiatria da infância e adolescência',
                'Psiquiatria forense',
                'Medicina do sono',
                'Sexologia',
                'Álcool e drogas',
            ],
        ];

        foreach ($especializacoesPorArea as $area => $especializacoes) {
            $areaModel = AtuaArea::where('descricao_area', $area)->first();
            foreach ($especializacoes as $especializacao) {
                Especializacao::create([
                    'descricao_especializacao' => $especializacao,
                    'area_atuacao_id' => $areaModel->id,
                ]);
            }
        }
    }
}


>>>>>>> develop
