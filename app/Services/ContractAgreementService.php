<?php namespace App\Services;

use App\Models\ContractAgreementSection;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Wpb\StringBladeCompiler\StringView;

class ContractAgreementService {

    /**
     * Get all contract agreement sections
     *
     * @param  array  $data
     * @return array
     */
    public function getAll(array $data)
    {
        $contractAgreementSections = ContractAgreementSection::all();
        $agreementSections = array();
        foreach ($contractAgreementSections as $contractAgreementSection)
        {
            $agreementSections[$contractAgreementSection['section_name']] =
            BladeCompiler::render($contractAgreementSection['content'], $data);
        }
        return $agreementSections;
    }

}
