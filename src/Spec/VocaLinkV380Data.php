<?php

namespace Cs278\BankModulus\Spec;

/** @internal */
abstract class VocaLinkV380Data
{
    /** @internal */
    final protected function fetchRecord($sortCode, $pass)
    {
        if (
               (1 === $pass && '010004' <= $sortCode && $sortCode <= '016715')
            || (1 === $pass && '100000' <= $sortCode && $sortCode <= '101099')
            || (1 === $pass && '101101' <= $sortCode && $sortCode <= '101498')
            || (1 === $pass && '101500' <= $sortCode && $sortCode <= '101999')
            || (1 === $pass && '102400' <= $sortCode && $sortCode <= '107999')
            || (1 === $pass && '108100' <= $sortCode && $sortCode <= '109999')
            || (1 === $pass && '500000' <= $sortCode && $sortCode <= '501029')
            || (1 === $pass && '502101' <= $sortCode && $sortCode <= '560070')
            || (1 === $pass && '600000' <= $sortCode && $sortCode <= '600108')
            || (1 === $pass && '600110' <= $sortCode && $sortCode <= '600124')
            || (1 === $pass && '600127' <= $sortCode && $sortCode <= '600142')
            || (1 === $pass && '600144' <= $sortCode && $sortCode <= '600149')
            || (1 === $pass && '600180' <= $sortCode && $sortCode <= '600304')
            || (1 === $pass && '600307' <= $sortCode && $sortCode <= '600312')
            || (1 === $pass && '600314' <= $sortCode && $sortCode <= '600355')
            || (1 === $pass && '600357' <= $sortCode && $sortCode <= '600851')
            || (1 === $pass && '600901' <= $sortCode && $sortCode <= '601360')
            || (1 === $pass && '601403' <= $sortCode && $sortCode <= '608028')
            || (1 === $pass && '640001' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '050000' <= $sortCode && $sortCode <= '050020')
            || (1 === $pass && '050022' <= $sortCode && $sortCode <= '058999')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 2, 1, 7, 5, 8, 2, 4, 1], 0];
        }

        if (
               (1 === $pass && '070116' === $sortCode)
            || (1 === $pass && '074456' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 7, 6, 5, 8, 9, 4, 5, 6, 7, 8, 9, -1], 12];
        }

        if (
               (2 === $pass && '070116' === $sortCode)
            || (2 === $pass && '074456' === $sortCode)
        ) {
            return ['MOD10', [0, 3, 2, 4, 5, 8, 9, 4, 5, 6, 7, 8, 9, -1], 13];
        }

        if (
               (1 === $pass && '070246' === $sortCode)
            || (1 === $pass && '070436' === $sortCode)
            || (1 === $pass && '070806' === $sortCode)
            || (1 === $pass && '070976' === $sortCode)
            || (1 === $pass && '071096' === $sortCode)
            || (1 === $pass && '071226' === $sortCode)
            || (1 === $pass && '071306' === $sortCode)
            || (1 === $pass && '071986' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 7, 6, 5, 8, 9, 4, 5, 6, 7, 8, 9, -1], 0];
        }

        if (
               (1 === $pass && '080211' === $sortCode)
            || (1 === $pass && '080228' === $sortCode)
            || (1 === $pass && '086001' === $sortCode)
            || (1 === $pass && '086020' === $sortCode)
            || (1 === $pass && '089000' <= $sortCode && $sortCode <= '089999')
            || (1 === $pass && '608301' === $sortCode)
            || (1 === $pass && '609593' === $sortCode)
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 0, 7, 1, 3, 7, 1, 3, 7, 1], 0];
        }

        if (
               (1 === $pass && '086086' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 8, 9, 4, 5, 6, 7, 8, 9, -1], 0];
        }

        if (
               (1 === $pass && '086090' === $sortCode)
        ) {
            return ['MOD10', [0, 0, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1], 8];
        }

        if (
               (1 === $pass && '090013' === $sortCode)
            || (1 === $pass && '090105' === $sortCode)
            || (1 === $pass && '090126' <= $sortCode && $sortCode <= '090129')
            || (1 === $pass && '090180' <= $sortCode && $sortCode <= '090185')
            || (1 === $pass && '090190' <= $sortCode && $sortCode <= '090196')
            || (1 === $pass && '090204' === $sortCode)
            || (1 === $pass && '090222' === $sortCode)
            || (1 === $pass && '090500' <= $sortCode && $sortCode <= '090599')
            || (1 === $pass && '090704' === $sortCode)
            || (1 === $pass && '090705' === $sortCode)
            || (1 === $pass && '090710' === $sortCode)
            || (1 === $pass && '090715' === $sortCode)
            || (1 === $pass && '090736' <= $sortCode && $sortCode <= '090739')
            || (1 === $pass && '090790' === $sortCode)
            || (1 === $pass && '091601' === $sortCode)
        ) {
            return ['MOD10', [0, 0, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1], 0];
        }

        if (
               (1 === $pass && '090118' === $sortCode)
            || (1 === $pass && '160000' <= $sortCode && $sortCode <= '161027')
            || (1 === $pass && '161030' <= $sortCode && $sortCode <= '161041')
            || (1 === $pass && '161050' === $sortCode)
            || (1 === $pass && '161055' === $sortCode)
            || (1 === $pass && '161060' === $sortCode)
            || (1 === $pass && '161065' === $sortCode)
            || (1 === $pass && '161070' === $sortCode)
            || (1 === $pass && '161075' === $sortCode)
            || (1 === $pass && '161080' === $sortCode)
            || (1 === $pass && '161085' === $sortCode)
            || (1 === $pass && '161090' === $sortCode)
            || (1 === $pass && '161100' <= $sortCode && $sortCode <= '162028')
            || (1 === $pass && '162030' <= $sortCode && $sortCode <= '164300')
            || (1 === $pass && '165901' <= $sortCode && $sortCode <= '166001')
            || (1 === $pass && '166050' <= $sortCode && $sortCode <= '167600')
        ) {
            return ['MOD11', [0, 0, 6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '090131' <= $sortCode && $sortCode <= '090136')
            || (1 === $pass && '090150' <= $sortCode && $sortCode <= '090156')
            || (1 === $pass && '090356' === $sortCode)
            || (1 === $pass && '090720' <= $sortCode && $sortCode <= '090726')
            || (1 === $pass && '720000' <= $sortCode && $sortCode <= '720249')
            || (1 === $pass && '720251' <= $sortCode && $sortCode <= '724443')
            || (1 === $pass && '725000' <= $sortCode && $sortCode <= '725251')
            || (1 === $pass && '725253' <= $sortCode && $sortCode <= '725616')
            || (1 === $pass && '726000' <= $sortCode && $sortCode <= '726616')
            || (1 === $pass && '890000' <= $sortCode && $sortCode <= '890699')
            || (1 === $pass && '891000' <= $sortCode && $sortCode <= '891616')
            || (1 === $pass && '892000' <= $sortCode && $sortCode <= '892616')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 9, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '091600' === $sortCode)
            || (1 === $pass && '091740' <= $sortCode && $sortCode <= '091743')
            || (1 === $pass && '091800' <= $sortCode && $sortCode <= '091809')
            || (1 === $pass && '091811' <= $sortCode && $sortCode <= '091865')
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 1, 7, 1, 3, 7, 1, 3, 7, 1], 0];
        }

        if (
               (1 === $pass && '108000' <= $sortCode && $sortCode <= '108079')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 3, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '108080' <= $sortCode && $sortCode <= '108099')
            || (1 === $pass && '238890' <= $sortCode && $sortCode <= '238899')
        ) {
            return ['MOD11', [0, 0, 0, 0, 4, 3, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '110000' <= $sortCode && $sortCode <= '119280')
            || (1 === $pass && '119282' <= $sortCode && $sortCode <= '119283')
            || (1 === $pass && '119285' <= $sortCode && $sortCode <= '119999')
        ) {
            return ['DBLAL', [0, 0, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 1];
        }

        if (
               (1 === $pass && '120000' <= $sortCode && $sortCode <= '120961')
            || (1 === $pass && '120963' <= $sortCode && $sortCode <= '122009')
            || (1 === $pass && '122011' <= $sortCode && $sortCode <= '122101')
            || (1 === $pass && '122103' <= $sortCode && $sortCode <= '122129')
            || (1 === $pass && '122131' <= $sortCode && $sortCode <= '122135')
            || (1 === $pass && '122213' <= $sortCode && $sortCode <= '122299')
            || (1 === $pass && '122400' <= $sortCode && $sortCode <= '122999')
            || (1 === $pass && '124000' <= $sortCode && $sortCode <= '124999')
            || (1 === $pass && '236247' === $sortCode)
            || (1 === $pass && '800000' <= $sortCode && $sortCode <= '802005')
            || (1 === $pass && '802007' <= $sortCode && $sortCode <= '802042')
            || (1 === $pass && '802044' <= $sortCode && $sortCode <= '802065')
            || (1 === $pass && '802067' <= $sortCode && $sortCode <= '802109')
            || (1 === $pass && '802111' <= $sortCode && $sortCode <= '802114')
            || (1 === $pass && '802116' <= $sortCode && $sortCode <= '802123')
            || (1 === $pass && '802151' <= $sortCode && $sortCode <= '802154')
            || (1 === $pass && '802156' <= $sortCode && $sortCode <= '802179')
            || (1 === $pass && '802181' <= $sortCode && $sortCode <= '803599')
            || (1 === $pass && '803609' <= $sortCode && $sortCode <= '819999')
        ) {
            return ['MOD11', [0, 0, 1, 8, 2, 6, 3, 7, 9, 5, 8, 4, 2, 1], 0];
        }

        if (
               (1 === $pass && '133000' <= $sortCode && $sortCode <= '133999')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 10, 7, 8, 4, 6, 3, 5, 2, 1], 0];
        }

        if (
               (1 === $pass && '134012' <= $sortCode && $sortCode <= '134020')
        ) {
            return ['MOD11', [0, 0, 0, 7, 5, 9, 8, 4, 6, 3, 5, 2, 0, 0], 4];
        }

        if (
               (1 === $pass && '134121' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 1, 0, 0, 8, 4, 6, 3, 5, 2, 0, 0], 4];
        }

        if (
               (1 === $pass && '150000' <= $sortCode && $sortCode <= '158000')
        ) {
            return ['MOD11', [4, 3, 0, 0, 0, 0, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '159800' === $sortCode)
            || (1 === $pass && '159900' === $sortCode)
            || (1 === $pass && '159910' === $sortCode)
            || (1 === $pass && '980000' <= $sortCode && $sortCode <= '980004')
            || (1 === $pass && '980006' <= $sortCode && $sortCode <= '983000')
            || (1 === $pass && '983003' <= $sortCode && $sortCode <= '987000')
            || (1 === $pass && '987004' <= $sortCode && $sortCode <= '989999')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 7, 6, 5, 4, 3, 2, 1, 0], 0];
        }

        if (
               (1 === $pass && '161029' === $sortCode)
            || (1 === $pass && '168600' === $sortCode)
            || (1 === $pass && '233483' === $sortCode)
            || (1 === $pass && '235451' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '170000' <= $sortCode && $sortCode <= '179499')
        ) {
            return ['MOD11', [0, 0, 4, 2, 7, 9, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '180002' === $sortCode)
            || (1 === $pass && '180005' === $sortCode)
            || (1 === $pass && '180009' === $sortCode)
            || (1 === $pass && '180036' === $sortCode)
            || (1 === $pass && '180038' === $sortCode)
            || (1 === $pass && '180091' <= $sortCode && $sortCode <= '180092')
            || (1 === $pass && '180104' === $sortCode)
            || (1 === $pass && '180109' <= $sortCode && $sortCode <= '180110')
            || (1 === $pass && '180156' === $sortCode)
            || (1 === $pass && '185001' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 8, 7, 6, 5, 4, 3, 2, 1], 14];
        }

        if (
               (1 === $pass && '185003' <= $sortCode && $sortCode <= '185025')
            || (1 === $pass && '185027' <= $sortCode && $sortCode <= '185099')
            || (1 === $pass && '230338' === $sortCode)
            || (1 === $pass && '230614' === $sortCode)
            || (1 === $pass && '230709' === $sortCode)
            || (1 === $pass && '230872' === $sortCode)
            || (1 === $pass && '230933' === $sortCode)
            || (1 === $pass && '231018' === $sortCode)
            || (1 === $pass && '231213' === $sortCode)
            || (1 === $pass && '231354' === $sortCode)
            || (1 === $pass && '231469' === $sortCode)
            || (1 === $pass && '231558' === $sortCode)
            || (1 === $pass && '231679' === $sortCode)
            || (1 === $pass && '231843' === $sortCode)
            || (1 === $pass && '231985' === $sortCode)
            || (1 === $pass && '232130' === $sortCode)
            || (1 === $pass && '232279' === $sortCode)
            || (1 === $pass && '232445' === $sortCode)
            || (1 === $pass && '232571' === $sortCode)
            || (1 === $pass && '232636' === $sortCode)
            || (1 === $pass && '232725' === $sortCode)
            || (1 === $pass && '232813' === $sortCode)
            || (1 === $pass && '232939' === $sortCode)
            || (1 === $pass && '233080' === $sortCode)
            || (1 === $pass && '233171' === $sortCode)
            || (1 === $pass && '233188' === $sortCode)
            || (1 === $pass && '233231' === $sortCode)
            || (1 === $pass && '233344' === $sortCode)
            || (1 === $pass && '233438' === $sortCode)
            || (1 === $pass && '233556' === $sortCode)
            || (1 === $pass && '233693' === $sortCode)
            || (1 === $pass && '233752' === $sortCode)
            || (1 === $pass && '234081' === $sortCode)
            || (1 === $pass && '234193' === $sortCode)
            || (1 === $pass && '234252' === $sortCode)
            || (1 === $pass && '234377' === $sortCode)
            || (1 === $pass && '234570' === $sortCode)
            || (1 === $pass && '234666' === $sortCode)
            || (1 === $pass && '234779' === $sortCode)
            || (1 === $pass && '234828' === $sortCode)
            || (1 === $pass && '234985' === $sortCode)
            || (1 === $pass && '235054' === $sortCode)
            || (1 === $pass && '235164' === $sortCode)
            || (1 === $pass && '235262' === $sortCode)
            || (1 === $pass && '235323' === $sortCode)
            || (1 === $pass && '235459' === $sortCode)
            || (1 === $pass && '235519' === $sortCode)
            || (1 === $pass && '235676' === $sortCode)
            || (1 === $pass && '235756' === $sortCode)
            || (1 === $pass && '235945' === $sortCode)
            || (1 === $pass && '236006' === $sortCode)
            || (1 === $pass && '236119' === $sortCode)
            || (1 === $pass && '236233' === $sortCode)
            || (1 === $pass && '236422' === $sortCode)
            || (1 === $pass && '236527' === $sortCode)
            || (1 === $pass && '236643' === $sortCode)
            || (1 === $pass && '236761' === $sortCode)
            || (1 === $pass && '236907' === $sortCode)
            || (1 === $pass && '237130' === $sortCode)
            || (1 === $pass && '237265' === $sortCode)
            || (1 === $pass && '237355' === $sortCode)
            || (1 === $pass && '237427' === $sortCode)
            || (1 === $pass && '237563' === $sortCode)
            || (1 === $pass && '237622' === $sortCode)
            || (1 === $pass && '237728' === $sortCode)
            || (1 === $pass && '237873' === $sortCode)
            || (1 === $pass && '238043' === $sortCode)
            || (1 === $pass && '238051' === $sortCode)
            || (1 === $pass && '238175' === $sortCode)
            || (1 === $pass && '238257' === $sortCode)
            || (1 === $pass && '238432' === $sortCode)
            || (1 === $pass && '238599' === $sortCode)
            || (1 === $pass && '238613' === $sortCode)
            || (1 === $pass && '238672' === $sortCode)
            || (1 === $pass && '238717' === $sortCode)
            || (1 === $pass && '238908' === $sortCode)
            || (1 === $pass && '239071' === $sortCode)
            || (1 === $pass && '239126' === $sortCode)
            || (1 === $pass && '239295' === $sortCode)
            || (1 === $pass && '239380' === $sortCode)
            || (1 === $pass && '239435' === $sortCode)
            || (1 === $pass && '239525' === $sortCode)
            || (1 === $pass && '239642' === $sortCode)
            || (1 === $pass && '239751' === $sortCode)
            || (1 === $pass && '400000' <= $sortCode && $sortCode <= '400514')
            || (1 === $pass && '400516' <= $sortCode && $sortCode <= '404799')
            || (1 === $pass && '950000' <= $sortCode && $sortCode <= '950002')
            || (1 === $pass && '950004' <= $sortCode && $sortCode <= '950479')
            || (1 === $pass && '950500' <= $sortCode && $sortCode <= '959999')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 0, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '200000' <= $sortCode && $sortCode <= '200002')
            || (1 === $pass && '200004' === $sortCode)
            || (1 === $pass && '200051' <= $sortCode && $sortCode <= '200077')
            || (1 === $pass && '200079' <= $sortCode && $sortCode <= '200097')
            || (1 === $pass && '200099' <= $sortCode && $sortCode <= '200156')
            || (1 === $pass && '200158' <= $sortCode && $sortCode <= '200387')
            || (1 === $pass && '200403' <= $sortCode && $sortCode <= '200405')
            || (1 === $pass && '200407' === $sortCode)
            || (1 === $pass && '200411' <= $sortCode && $sortCode <= '200412')
            || (1 === $pass && '200414' <= $sortCode && $sortCode <= '200423')
            || (1 === $pass && '200425' <= $sortCode && $sortCode <= '200899')
            || (1 === $pass && '200901' <= $sortCode && $sortCode <= '201159')
            || (1 === $pass && '201161' <= $sortCode && $sortCode <= '201177')
            || (1 === $pass && '201179' <= $sortCode && $sortCode <= '201351')
            || (1 === $pass && '201353' <= $sortCode && $sortCode <= '202698')
            || (1 === $pass && '202700' <= $sortCode && $sortCode <= '203239')
            || (1 === $pass && '203241' <= $sortCode && $sortCode <= '203255')
            || (1 === $pass && '203259' <= $sortCode && $sortCode <= '203519')
            || (1 === $pass && '203521' <= $sortCode && $sortCode <= '204476')
            || (1 === $pass && '204478' <= $sortCode && $sortCode <= '205475')
            || (1 === $pass && '205477' <= $sortCode && $sortCode <= '205954')
            || (1 === $pass && '205956' <= $sortCode && $sortCode <= '206124')
            || (1 === $pass && '206126' <= $sortCode && $sortCode <= '206157')
            || (1 === $pass && '206159' <= $sortCode && $sortCode <= '206390')
            || (1 === $pass && '206392' <= $sortCode && $sortCode <= '206799')
            || (1 === $pass && '206802' <= $sortCode && $sortCode <= '206874')
            || (1 === $pass && '206876' <= $sortCode && $sortCode <= '207170')
            || (1 === $pass && '207173' <= $sortCode && $sortCode <= '208092')
            || (1 === $pass && '208094' <= $sortCode && $sortCode <= '208721')
            || (1 === $pass && '208723' <= $sortCode && $sortCode <= '209034')
            || (1 === $pass && '209036' <= $sortCode && $sortCode <= '209128')
            || (1 === $pass && '209130' <= $sortCode && $sortCode <= '209999')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 0, 7, 6, 5, 4, 3, 2, 1], 6];
        }

        if (
               (2 === $pass && '200000' <= $sortCode && $sortCode <= '200002')
            || (2 === $pass && '200004' === $sortCode)
            || (2 === $pass && '200051' <= $sortCode && $sortCode <= '200077')
            || (2 === $pass && '200079' <= $sortCode && $sortCode <= '200097')
            || (2 === $pass && '200099' <= $sortCode && $sortCode <= '200156')
            || (2 === $pass && '200158' <= $sortCode && $sortCode <= '200387')
            || (2 === $pass && '200403' <= $sortCode && $sortCode <= '200405')
            || (2 === $pass && '200407' === $sortCode)
            || (2 === $pass && '200411' <= $sortCode && $sortCode <= '200412')
            || (2 === $pass && '200414' <= $sortCode && $sortCode <= '200423')
            || (2 === $pass && '200425' <= $sortCode && $sortCode <= '200899')
            || (2 === $pass && '200901' <= $sortCode && $sortCode <= '201159')
            || (2 === $pass && '201161' <= $sortCode && $sortCode <= '201177')
            || (2 === $pass && '201179' <= $sortCode && $sortCode <= '201351')
            || (2 === $pass && '201353' <= $sortCode && $sortCode <= '202698')
            || (2 === $pass && '202700' <= $sortCode && $sortCode <= '203239')
            || (2 === $pass && '203241' <= $sortCode && $sortCode <= '203255')
            || (2 === $pass && '203259' <= $sortCode && $sortCode <= '203519')
            || (2 === $pass && '203521' <= $sortCode && $sortCode <= '204476')
            || (2 === $pass && '204478' <= $sortCode && $sortCode <= '205475')
            || (2 === $pass && '205477' <= $sortCode && $sortCode <= '205954')
            || (2 === $pass && '205956' <= $sortCode && $sortCode <= '206124')
            || (2 === $pass && '206126' <= $sortCode && $sortCode <= '206157')
            || (2 === $pass && '206159' <= $sortCode && $sortCode <= '206390')
            || (2 === $pass && '206392' <= $sortCode && $sortCode <= '206799')
            || (2 === $pass && '206802' <= $sortCode && $sortCode <= '206874')
            || (2 === $pass && '206876' <= $sortCode && $sortCode <= '207170')
            || (2 === $pass && '207173' <= $sortCode && $sortCode <= '208092')
            || (2 === $pass && '208094' <= $sortCode && $sortCode <= '208721')
            || (2 === $pass && '208723' <= $sortCode && $sortCode <= '209034')
            || (2 === $pass && '209036' <= $sortCode && $sortCode <= '209128')
            || (2 === $pass && '209130' <= $sortCode && $sortCode <= '209999')
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 6];
        }

        if (
               (2 === $pass && '230338' === $sortCode)
            || (2 === $pass && '230614' === $sortCode)
            || (2 === $pass && '230709' === $sortCode)
            || (2 === $pass && '230872' === $sortCode)
            || (2 === $pass && '230933' === $sortCode)
            || (2 === $pass && '231018' === $sortCode)
            || (2 === $pass && '231213' === $sortCode)
            || (2 === $pass && '231354' === $sortCode)
            || (2 === $pass && '231469' === $sortCode)
            || (2 === $pass && '231558' === $sortCode)
            || (2 === $pass && '231679' === $sortCode)
            || (2 === $pass && '231843' === $sortCode)
            || (2 === $pass && '231985' === $sortCode)
            || (2 === $pass && '232130' === $sortCode)
            || (2 === $pass && '232279' === $sortCode)
            || (2 === $pass && '232445' === $sortCode)
            || (2 === $pass && '232571' === $sortCode)
            || (2 === $pass && '232636' === $sortCode)
            || (2 === $pass && '232725' === $sortCode)
            || (2 === $pass && '232813' === $sortCode)
            || (2 === $pass && '232939' === $sortCode)
            || (2 === $pass && '233080' === $sortCode)
            || (2 === $pass && '233171' === $sortCode)
            || (2 === $pass && '233188' === $sortCode)
            || (2 === $pass && '233231' === $sortCode)
            || (2 === $pass && '233344' === $sortCode)
            || (2 === $pass && '233438' === $sortCode)
            || (2 === $pass && '233556' === $sortCode)
            || (2 === $pass && '233693' === $sortCode)
            || (2 === $pass && '233752' === $sortCode)
            || (2 === $pass && '234081' === $sortCode)
            || (2 === $pass && '234193' === $sortCode)
            || (2 === $pass && '234252' === $sortCode)
            || (2 === $pass && '234377' === $sortCode)
            || (2 === $pass && '234570' === $sortCode)
            || (2 === $pass && '234666' === $sortCode)
            || (2 === $pass && '234779' === $sortCode)
            || (2 === $pass && '234828' === $sortCode)
            || (2 === $pass && '234985' === $sortCode)
            || (2 === $pass && '235054' === $sortCode)
            || (2 === $pass && '235164' === $sortCode)
            || (2 === $pass && '235262' === $sortCode)
            || (2 === $pass && '235323' === $sortCode)
            || (2 === $pass && '235459' === $sortCode)
            || (2 === $pass && '235519' === $sortCode)
            || (2 === $pass && '235676' === $sortCode)
            || (2 === $pass && '235756' === $sortCode)
            || (2 === $pass && '235945' === $sortCode)
            || (2 === $pass && '236006' === $sortCode)
            || (2 === $pass && '236119' === $sortCode)
            || (2 === $pass && '236233' === $sortCode)
            || (2 === $pass && '236422' === $sortCode)
            || (2 === $pass && '236527' === $sortCode)
            || (2 === $pass && '236643' === $sortCode)
            || (2 === $pass && '236761' === $sortCode)
            || (2 === $pass && '236907' === $sortCode)
            || (2 === $pass && '237130' === $sortCode)
            || (2 === $pass && '237265' === $sortCode)
            || (2 === $pass && '237355' === $sortCode)
            || (2 === $pass && '237427' === $sortCode)
            || (2 === $pass && '237563' === $sortCode)
            || (2 === $pass && '237622' === $sortCode)
            || (2 === $pass && '237728' === $sortCode)
            || (2 === $pass && '237873' === $sortCode)
            || (2 === $pass && '238043' === $sortCode)
            || (2 === $pass && '238051' === $sortCode)
            || (2 === $pass && '238175' === $sortCode)
            || (2 === $pass && '238257' === $sortCode)
            || (2 === $pass && '238392' <= $sortCode && $sortCode <= '238431')
            || (2 === $pass && '238432' === $sortCode)
            || (2 === $pass && '238433' <= $sortCode && $sortCode <= '238583')
            || (2 === $pass && '238585' <= $sortCode && $sortCode <= '238590')
            || (2 === $pass && '238599' === $sortCode)
            || (2 === $pass && '238613' === $sortCode)
            || (2 === $pass && '238672' === $sortCode)
            || (2 === $pass && '238717' === $sortCode)
            || (2 === $pass && '238908' === $sortCode)
            || (2 === $pass && '239071' === $sortCode)
            || (2 === $pass && '239126' === $sortCode)
            || (2 === $pass && '239136' <= $sortCode && $sortCode <= '239140')
            || (2 === $pass && '239143' <= $sortCode && $sortCode <= '239144')
            || (2 === $pass && '239282' <= $sortCode && $sortCode <= '239283')
            || (2 === $pass && '239285' <= $sortCode && $sortCode <= '239294')
            || (2 === $pass && '239295' === $sortCode)
            || (2 === $pass && '239296' <= $sortCode && $sortCode <= '239318')
            || (2 === $pass && '239380' === $sortCode)
            || (2 === $pass && '239435' === $sortCode)
            || (2 === $pass && '239525' === $sortCode)
            || (2 === $pass && '239642' === $sortCode)
            || (2 === $pass && '239751' === $sortCode)
            || (2 === $pass && '400000' <= $sortCode && $sortCode <= '400514')
            || (2 === $pass && '400516' <= $sortCode && $sortCode <= '404799')
            || (2 === $pass && '839105' <= $sortCode && $sortCode <= '839106')
            || (2 === $pass && '839130' <= $sortCode && $sortCode <= '839131')
            || (2 === $pass && '950000' <= $sortCode && $sortCode <= '950002')
            || (2 === $pass && '950004' <= $sortCode && $sortCode <= '950479')
            || (2 === $pass && '950500' <= $sortCode && $sortCode <= '959999')
            || (2 === $pass && '980000' <= $sortCode && $sortCode <= '980004')
            || (2 === $pass && '980006' <= $sortCode && $sortCode <= '983000')
            || (2 === $pass && '983003' <= $sortCode && $sortCode <= '987000')
            || (2 === $pass && '987004' <= $sortCode && $sortCode <= '989999')
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 0];
        }

        if (
               (1 === $pass && '230580' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 2, 7, 6, 5, 4, 3, 2, 1], 12];
        }

        if (
               (2 === $pass && '230580' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 5, 7, 6, 5, 4, 3, 2, 1], 13];
        }

        if (
               (1 === $pass && '233142' === $sortCode)
        ) {
            return ['MOD10', [2, 1, 2, 1, 2, 1, 30, 36, 24, 20, 16, 12, 8, 4], 0];
        }

        if (
               (1 === $pass && '233456' === $sortCode)
        ) {
            return ['MOD10', [2, 1, 2, 1, 2, 1, 0, 64, 32, 16, 8, 4, 2, 1], 0];
        }

        if (
               (1 === $pass && '238392' <= $sortCode && $sortCode <= '238431')
            || (1 === $pass && '238433' <= $sortCode && $sortCode <= '238583')
            || (1 === $pass && '238585' <= $sortCode && $sortCode <= '238590')
            || (1 === $pass && '239136' <= $sortCode && $sortCode <= '239140')
            || (1 === $pass && '239143' <= $sortCode && $sortCode <= '239144')
            || (1 === $pass && '239282' <= $sortCode && $sortCode <= '239283')
            || (1 === $pass && '239285' <= $sortCode && $sortCode <= '239294')
            || (1 === $pass && '239296' <= $sortCode && $sortCode <= '239318')
            || (1 === $pass && '839105' <= $sortCode && $sortCode <= '839106')
            || (1 === $pass && '839130' <= $sortCode && $sortCode <= '839131')
        ) {
            return ['MOD11', [7, 6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2, 1, 0], 0];
        }

        if (
               (1 === $pass && '300000' <= $sortCode && $sortCode <= '300006')
            || (1 === $pass && '300008' <= $sortCode && $sortCode <= '300009')
            || (1 === $pass && '300134' <= $sortCode && $sortCode <= '300138')
            || (1 === $pass && '301001' === $sortCode)
            || (1 === $pass && '301004' === $sortCode)
            || (1 === $pass && '301007' === $sortCode)
            || (1 === $pass && '301012' === $sortCode)
            || (1 === $pass && '301047' === $sortCode)
            || (1 === $pass && '301049' === $sortCode)
            || (1 === $pass && '301052' === $sortCode)
            || (1 === $pass && '301075' <= $sortCode && $sortCode <= '301076')
            || (1 === $pass && '301108' === $sortCode)
            || (1 === $pass && '301112' === $sortCode)
            || (1 === $pass && '301127' === $sortCode)
            || (1 === $pass && '301148' === $sortCode)
            || (1 === $pass && '301161' === $sortCode)
            || (1 === $pass && '301174' <= $sortCode && $sortCode <= '301175')
            || (1 === $pass && '301191' === $sortCode)
            || (1 === $pass && '301194' <= $sortCode && $sortCode <= '301195')
            || (1 === $pass && '301204' <= $sortCode && $sortCode <= '301205')
            || (1 === $pass && '301209' <= $sortCode && $sortCode <= '301210')
            || (1 === $pass && '301215' === $sortCode)
            || (1 === $pass && '301218' === $sortCode)
            || (1 === $pass && '301220' <= $sortCode && $sortCode <= '301221')
            || (1 === $pass && '301234' === $sortCode)
            || (1 === $pass && '301251' === $sortCode)
            || (1 === $pass && '301259' === $sortCode)
            || (1 === $pass && '301274' === $sortCode)
            || (1 === $pass && '301280' === $sortCode)
            || (1 === $pass && '301286' === $sortCode)
            || (1 === $pass && '301295' <= $sortCode && $sortCode <= '301296')
            || (1 === $pass && '301299' === $sortCode)
            || (1 === $pass && '301301' === $sortCode)
            || (1 === $pass && '301305' === $sortCode)
            || (1 === $pass && '301318' === $sortCode)
            || (1 === $pass && '301330' === $sortCode)
            || (1 === $pass && '301332' === $sortCode)
            || (1 === $pass && '301335' === $sortCode)
            || (1 === $pass && '301342' === $sortCode)
            || (1 === $pass && '301350' <= $sortCode && $sortCode <= '301355')
            || (1 === $pass && '301364' === $sortCode)
            || (1 === $pass && '301368' === $sortCode)
            || (1 === $pass && '301376' === $sortCode)
            || (1 === $pass && '301380' === $sortCode)
            || (1 === $pass && '301388' === $sortCode)
            || (1 === $pass && '301390' === $sortCode)
            || (1 === $pass && '301395' === $sortCode)
            || (1 === $pass && '301400' === $sortCode)
            || (1 === $pass && '301424' === $sortCode)
            || (1 === $pass && '301432' === $sortCode)
            || (1 === $pass && '301437' === $sortCode)
            || (1 === $pass && '301440' === $sortCode)
            || (1 === $pass && '301444' === $sortCode)
            || (1 === $pass && '301447' === $sortCode)
            || (1 === $pass && '301451' === $sortCode)
            || (1 === $pass && '301456' === $sortCode)
            || (1 === $pass && '301460' === $sortCode)
            || (1 === $pass && '301464' === $sortCode)
            || (1 === $pass && '301469' === $sortCode)
            || (1 === $pass && '301471' === $sortCode)
            || (1 === $pass && '301477' === $sortCode)
            || (1 === $pass && '301483' === $sortCode)
            || (1 === $pass && '301504' === $sortCode)
            || (1 === $pass && '301539' === $sortCode)
            || (1 === $pass && '301542' === $sortCode)
            || (1 === $pass && '301552' <= $sortCode && $sortCode <= '301553')
            || (1 === $pass && '301557' === $sortCode)
            || (1 === $pass && '301593' === $sortCode)
            || (1 === $pass && '301595' === $sortCode)
            || (1 === $pass && '301597' === $sortCode)
            || (1 === $pass && '301599' === $sortCode)
            || (1 === $pass && '301609' === $sortCode)
            || (1 === $pass && '301611' === $sortCode)
            || (1 === $pass && '301620' === $sortCode)
            || (1 === $pass && '301628' === $sortCode)
            || (1 === $pass && '301634' === $sortCode)
            || (1 === $pass && '301641' <= $sortCode && $sortCode <= '301642')
            || (1 === $pass && '301653' === $sortCode)
            || (1 === $pass && '301662' === $sortCode)
            || (1 === $pass && '301664' === $sortCode)
            || (1 === $pass && '301670' === $sortCode)
            || (1 === $pass && '301674' === $sortCode)
            || (1 === $pass && '301684' === $sortCode)
            || (1 === $pass && '301695' <= $sortCode && $sortCode <= '301696')
            || (1 === $pass && '301700' <= $sortCode && $sortCode <= '301702')
            || (1 === $pass && '301712' === $sortCode)
            || (1 === $pass && '301716' === $sortCode)
            || (1 === $pass && '301748' === $sortCode)
            || (1 === $pass && '301773' === $sortCode)
            || (1 === $pass && '301777' === $sortCode)
            || (1 === $pass && '301780' === $sortCode)
            || (1 === $pass && '301785' === $sortCode)
            || (1 === $pass && '301803' === $sortCode)
            || (1 === $pass && '301805' === $sortCode)
            || (1 === $pass && '301806' === $sortCode)
            || (1 === $pass && '301816' === $sortCode)
            || (1 === $pass && '301825' === $sortCode)
            || (1 === $pass && '301830' === $sortCode)
            || (1 === $pass && '301834' === $sortCode)
            || (1 === $pass && '301843' === $sortCode)
            || (1 === $pass && '301845' === $sortCode)
            || (1 === $pass && '301855' <= $sortCode && $sortCode <= '301856')
            || (1 === $pass && '301864' === $sortCode)
            || (1 === $pass && '301868' <= $sortCode && $sortCode <= '301869')
            || (1 === $pass && '301883' === $sortCode)
            || (1 === $pass && '301886' <= $sortCode && $sortCode <= '301888')
            || (1 === $pass && '301898' === $sortCode)
            || (1 === $pass && '301914' <= $sortCode && $sortCode <= '301996')
            || (1 === $pass && '302500' === $sortCode)
            || (1 === $pass && '302556' === $sortCode)
            || (1 === $pass && '302579' <= $sortCode && $sortCode <= '302580')
            || (1 === $pass && '303460' <= $sortCode && $sortCode <= '303461')
            || (1 === $pass && '305907' <= $sortCode && $sortCode <= '305939')
            || (1 === $pass && '305941' <= $sortCode && $sortCode <= '305960')
            || (1 === $pass && '305971' === $sortCode)
            || (1 === $pass && '305974' === $sortCode)
            || (1 === $pass && '305978' === $sortCode)
            || (1 === $pass && '305982' === $sortCode)
            || (1 === $pass && '305984' <= $sortCode && $sortCode <= '305988')
            || (1 === $pass && '305990' <= $sortCode && $sortCode <= '305993')
            || (1 === $pass && '306017' <= $sortCode && $sortCode <= '306018')
            || (1 === $pass && '306020' === $sortCode)
            || (1 === $pass && '306028' === $sortCode)
            || (1 === $pass && '306038' === $sortCode)
            || (1 === $pass && '306150' <= $sortCode && $sortCode <= '306151')
            || (1 === $pass && '306154' <= $sortCode && $sortCode <= '306155')
            || (1 === $pass && '306228' === $sortCode)
            || (1 === $pass && '306229' === $sortCode)
            || (1 === $pass && '306232' === $sortCode)
            || (1 === $pass && '306242' === $sortCode)
            || (1 === $pass && '306245' === $sortCode)
            || (1 === $pass && '306249' === $sortCode)
            || (1 === $pass && '306255' === $sortCode)
            || (1 === $pass && '306259' <= $sortCode && $sortCode <= '306263')
            || (1 === $pass && '306272' <= $sortCode && $sortCode <= '306279')
            || (1 === $pass && '306281' === $sortCode)
            || (1 === $pass && '306289' === $sortCode)
            || (1 === $pass && '306296' === $sortCode)
            || (1 === $pass && '306299' === $sortCode)
            || (1 === $pass && '306300' === $sortCode)
            || (1 === $pass && '306347' === $sortCode)
            || (1 === $pass && '306354' <= $sortCode && $sortCode <= '306355')
            || (1 === $pass && '306357' === $sortCode)
            || (1 === $pass && '306359' === $sortCode)
            || (1 === $pass && '306364' === $sortCode)
            || (1 === $pass && '306394' === $sortCode)
            || (1 === $pass && '306397' === $sortCode)
            || (1 === $pass && '306410' === $sortCode)
            || (1 === $pass && '306412' === $sortCode)
            || (1 === $pass && '306414' <= $sortCode && $sortCode <= '306415')
            || (1 === $pass && '306418' <= $sortCode && $sortCode <= '306419')
            || (1 === $pass && '306422' === $sortCode)
            || (1 === $pass && '306434' === $sortCode)
            || (1 === $pass && '306437' <= $sortCode && $sortCode <= '306438')
            || (1 === $pass && '306442' <= $sortCode && $sortCode <= '306444')
            || (1 === $pass && '306457' === $sortCode)
            || (1 === $pass && '306472' === $sortCode)
            || (1 === $pass && '306479' === $sortCode)
            || (1 === $pass && '306497' === $sortCode)
            || (1 === $pass && '306521' <= $sortCode && $sortCode <= '306522')
            || (1 === $pass && '306537' <= $sortCode && $sortCode <= '306539')
            || (1 === $pass && '306541' === $sortCode)
            || (1 === $pass && '306549' === $sortCode)
            || (1 === $pass && '306562' <= $sortCode && $sortCode <= '306565')
            || (1 === $pass && '306572' === $sortCode)
            || (1 === $pass && '306585' <= $sortCode && $sortCode <= '306586')
            || (1 === $pass && '306592' <= $sortCode && $sortCode <= '306593')
            || (1 === $pass && '306675' <= $sortCode && $sortCode <= '306677')
            || (1 === $pass && '306689' === $sortCode)
            || (1 === $pass && '306695' <= $sortCode && $sortCode <= '306696')
            || (1 === $pass && '306733' <= $sortCode && $sortCode <= '306735')
            || (1 === $pass && '306747' <= $sortCode && $sortCode <= '306749')
            || (1 === $pass && '306753' === $sortCode)
            || (1 === $pass && '306756' === $sortCode)
            || (1 === $pass && '306759' === $sortCode)
            || (1 === $pass && '306762' === $sortCode)
            || (1 === $pass && '306764' === $sortCode)
            || (1 === $pass && '306766' <= $sortCode && $sortCode <= '306767')
            || (1 === $pass && '306769' === $sortCode)
            || (1 === $pass && '306772' === $sortCode)
            || (1 === $pass && '306775' <= $sortCode && $sortCode <= '306776')
            || (1 === $pass && '306779' === $sortCode)
            || (1 === $pass && '306782' === $sortCode)
            || (1 === $pass && '306788' <= $sortCode && $sortCode <= '306789')
            || (1 === $pass && '306799' === $sortCode)
            || (1 === $pass && '307184' === $sortCode)
            || (1 === $pass && '307188' <= $sortCode && $sortCode <= '307190')
            || (1 === $pass && '307198' === $sortCode)
            || (1 === $pass && '307271' === $sortCode)
            || (1 === $pass && '307274' === $sortCode)
            || (1 === $pass && '307654' === $sortCode)
            || (1 === $pass && '307779' === $sortCode)
            || (1 === $pass && '307788' <= $sortCode && $sortCode <= '307789')
            || (1 === $pass && '307809' === $sortCode)
            || (1 === $pass && '308012' === $sortCode)
            || (1 === $pass && '308016' === $sortCode)
            || (1 === $pass && '308026' <= $sortCode && $sortCode <= '308027')
            || (1 === $pass && '308033' <= $sortCode && $sortCode <= '308034')
            || (1 === $pass && '308037' === $sortCode)
            || (1 === $pass && '308042' === $sortCode)
            || (1 === $pass && '308045' === $sortCode)
            || (1 === $pass && '308048' <= $sortCode && $sortCode <= '308049')
            || (1 === $pass && '308054' <= $sortCode && $sortCode <= '308055')
            || (1 === $pass && '308063' === $sortCode)
            || (1 === $pass && '308076' <= $sortCode && $sortCode <= '308077')
            || (1 === $pass && '308082' <= $sortCode && $sortCode <= '308083')
            || (1 === $pass && '308085' === $sortCode)
            || (1 === $pass && '308087' <= $sortCode && $sortCode <= '308089')
            || (1 === $pass && '308095' <= $sortCode && $sortCode <= '308097')
            || (1 === $pass && '308404' === $sortCode)
            || (1 === $pass && '308412' === $sortCode)
            || (1 === $pass && '308420' <= $sortCode && $sortCode <= '308427')
            || (1 === $pass && '308433' <= $sortCode && $sortCode <= '308434')
            || (1 === $pass && '308441' <= $sortCode && $sortCode <= '308446')
            || (1 === $pass && '308448' === $sortCode)
            || (1 === $pass && '308451' <= $sortCode && $sortCode <= '308454')
            || (1 === $pass && '308457' <= $sortCode && $sortCode <= '308459')
            || (1 === $pass && '308462' <= $sortCode && $sortCode <= '308463')
            || (1 === $pass && '308467' <= $sortCode && $sortCode <= '308469')
            || (1 === $pass && '308472' <= $sortCode && $sortCode <= '308473')
            || (1 === $pass && '308475' <= $sortCode && $sortCode <= '308477')
            || (1 === $pass && '308479' === $sortCode)
            || (1 === $pass && '308482' === $sortCode)
            || (1 === $pass && '308484' <= $sortCode && $sortCode <= '308487')
            || (1 === $pass && '308784' === $sortCode)
            || (1 === $pass && '308804' === $sortCode)
            || (1 === $pass && '308822' === $sortCode)
            || (1 === $pass && '308952' === $sortCode)
            || (1 === $pass && '309001' <= $sortCode && $sortCode <= '309633')
            || (1 === $pass && '309635' <= $sortCode && $sortCode <= '309746')
            || (1 === $pass && '309748' <= $sortCode && $sortCode <= '309871')
            || (1 === $pass && '309873' <= $sortCode && $sortCode <= '309915')
            || (1 === $pass && '309917' <= $sortCode && $sortCode <= '309999')
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 5, 7, 6, 5, 4, 3, 2, 1], 2];
        }

        if (
               (2 === $pass && '300000' <= $sortCode && $sortCode <= '300006')
            || (2 === $pass && '300008' <= $sortCode && $sortCode <= '300009')
            || (2 === $pass && '300134' <= $sortCode && $sortCode <= '300138')
            || (2 === $pass && '301001' === $sortCode)
            || (2 === $pass && '301004' === $sortCode)
            || (2 === $pass && '301007' === $sortCode)
            || (2 === $pass && '301012' === $sortCode)
            || (2 === $pass && '301047' === $sortCode)
            || (2 === $pass && '301049' === $sortCode)
            || (2 === $pass && '301052' === $sortCode)
            || (2 === $pass && '301075' <= $sortCode && $sortCode <= '301076')
            || (2 === $pass && '301108' === $sortCode)
            || (2 === $pass && '301112' === $sortCode)
            || (2 === $pass && '301127' === $sortCode)
            || (2 === $pass && '301148' === $sortCode)
            || (2 === $pass && '301161' === $sortCode)
            || (2 === $pass && '301174' <= $sortCode && $sortCode <= '301175')
            || (2 === $pass && '301191' === $sortCode)
            || (2 === $pass && '301194' <= $sortCode && $sortCode <= '301195')
            || (2 === $pass && '301204' <= $sortCode && $sortCode <= '301205')
            || (2 === $pass && '301209' <= $sortCode && $sortCode <= '301210')
            || (2 === $pass && '301215' === $sortCode)
            || (2 === $pass && '301218' === $sortCode)
            || (2 === $pass && '301220' <= $sortCode && $sortCode <= '301221')
            || (2 === $pass && '301234' === $sortCode)
            || (2 === $pass && '301251' === $sortCode)
            || (2 === $pass && '301259' === $sortCode)
            || (2 === $pass && '301274' === $sortCode)
            || (2 === $pass && '301280' === $sortCode)
            || (2 === $pass && '301286' === $sortCode)
            || (2 === $pass && '301295' <= $sortCode && $sortCode <= '301296')
            || (2 === $pass && '301299' === $sortCode)
            || (2 === $pass && '301301' === $sortCode)
            || (2 === $pass && '301305' === $sortCode)
            || (2 === $pass && '301318' === $sortCode)
            || (2 === $pass && '301330' === $sortCode)
            || (2 === $pass && '301332' === $sortCode)
            || (2 === $pass && '301335' === $sortCode)
            || (2 === $pass && '301342' === $sortCode)
            || (2 === $pass && '301350' <= $sortCode && $sortCode <= '301355')
            || (2 === $pass && '301364' === $sortCode)
            || (2 === $pass && '301368' === $sortCode)
            || (2 === $pass && '301376' === $sortCode)
            || (2 === $pass && '301380' === $sortCode)
            || (2 === $pass && '301388' === $sortCode)
            || (2 === $pass && '301390' === $sortCode)
            || (2 === $pass && '301395' === $sortCode)
            || (2 === $pass && '301400' === $sortCode)
            || (2 === $pass && '301424' === $sortCode)
            || (2 === $pass && '301432' === $sortCode)
            || (2 === $pass && '301437' === $sortCode)
            || (2 === $pass && '301440' === $sortCode)
            || (2 === $pass && '301444' === $sortCode)
            || (2 === $pass && '301447' === $sortCode)
            || (2 === $pass && '301451' === $sortCode)
            || (2 === $pass && '301456' === $sortCode)
            || (2 === $pass && '301460' === $sortCode)
            || (2 === $pass && '301464' === $sortCode)
            || (2 === $pass && '301469' === $sortCode)
            || (2 === $pass && '301471' === $sortCode)
            || (2 === $pass && '301477' === $sortCode)
            || (2 === $pass && '301483' === $sortCode)
            || (2 === $pass && '301504' === $sortCode)
            || (2 === $pass && '301539' === $sortCode)
            || (2 === $pass && '301542' === $sortCode)
            || (2 === $pass && '301552' <= $sortCode && $sortCode <= '301553')
            || (2 === $pass && '301557' === $sortCode)
            || (2 === $pass && '301593' === $sortCode)
            || (2 === $pass && '301595' === $sortCode)
            || (2 === $pass && '301597' === $sortCode)
            || (2 === $pass && '301599' === $sortCode)
            || (2 === $pass && '301609' === $sortCode)
            || (2 === $pass && '301611' === $sortCode)
            || (2 === $pass && '301620' === $sortCode)
            || (2 === $pass && '301628' === $sortCode)
            || (2 === $pass && '301634' === $sortCode)
            || (2 === $pass && '301641' <= $sortCode && $sortCode <= '301642')
            || (2 === $pass && '301653' === $sortCode)
            || (2 === $pass && '301662' === $sortCode)
            || (2 === $pass && '301664' === $sortCode)
            || (2 === $pass && '301670' === $sortCode)
            || (2 === $pass && '301674' === $sortCode)
            || (2 === $pass && '301684' === $sortCode)
            || (2 === $pass && '301695' <= $sortCode && $sortCode <= '301696')
            || (2 === $pass && '301700' <= $sortCode && $sortCode <= '301702')
            || (2 === $pass && '301712' === $sortCode)
            || (2 === $pass && '301716' === $sortCode)
            || (2 === $pass && '301748' === $sortCode)
            || (2 === $pass && '301773' === $sortCode)
            || (2 === $pass && '301777' === $sortCode)
            || (2 === $pass && '301780' === $sortCode)
            || (2 === $pass && '301785' === $sortCode)
            || (2 === $pass && '301803' === $sortCode)
            || (2 === $pass && '301805' === $sortCode)
            || (2 === $pass && '301806' === $sortCode)
            || (2 === $pass && '301816' === $sortCode)
            || (2 === $pass && '301825' === $sortCode)
            || (2 === $pass && '301830' === $sortCode)
            || (2 === $pass && '301834' === $sortCode)
            || (2 === $pass && '301843' === $sortCode)
            || (2 === $pass && '301845' === $sortCode)
            || (2 === $pass && '301855' <= $sortCode && $sortCode <= '301856')
            || (2 === $pass && '301864' === $sortCode)
            || (2 === $pass && '301868' <= $sortCode && $sortCode <= '301869')
            || (2 === $pass && '301883' === $sortCode)
            || (2 === $pass && '301886' <= $sortCode && $sortCode <= '301888')
            || (2 === $pass && '301898' === $sortCode)
            || (2 === $pass && '301914' <= $sortCode && $sortCode <= '301996')
            || (2 === $pass && '302500' === $sortCode)
            || (2 === $pass && '302556' === $sortCode)
            || (2 === $pass && '302579' <= $sortCode && $sortCode <= '302580')
            || (2 === $pass && '303460' <= $sortCode && $sortCode <= '303461')
            || (2 === $pass && '305907' <= $sortCode && $sortCode <= '305939')
            || (2 === $pass && '305941' <= $sortCode && $sortCode <= '305960')
            || (2 === $pass && '305971' === $sortCode)
            || (2 === $pass && '305974' === $sortCode)
            || (2 === $pass && '305978' === $sortCode)
            || (2 === $pass && '305982' === $sortCode)
            || (2 === $pass && '305984' <= $sortCode && $sortCode <= '305988')
            || (2 === $pass && '305990' <= $sortCode && $sortCode <= '305993')
            || (2 === $pass && '306017' <= $sortCode && $sortCode <= '306018')
            || (2 === $pass && '306020' === $sortCode)
            || (2 === $pass && '306028' === $sortCode)
            || (2 === $pass && '306038' === $sortCode)
            || (2 === $pass && '306150' <= $sortCode && $sortCode <= '306151')
            || (2 === $pass && '306154' <= $sortCode && $sortCode <= '306155')
            || (2 === $pass && '306228' === $sortCode)
            || (2 === $pass && '306229' === $sortCode)
            || (2 === $pass && '306232' === $sortCode)
            || (2 === $pass && '306242' === $sortCode)
            || (2 === $pass && '306245' === $sortCode)
            || (2 === $pass && '306249' === $sortCode)
            || (2 === $pass && '306255' === $sortCode)
            || (2 === $pass && '306259' <= $sortCode && $sortCode <= '306263')
            || (2 === $pass && '306272' <= $sortCode && $sortCode <= '306279')
            || (2 === $pass && '306281' === $sortCode)
            || (2 === $pass && '306289' === $sortCode)
            || (2 === $pass && '306296' === $sortCode)
            || (2 === $pass && '306299' === $sortCode)
            || (2 === $pass && '306300' === $sortCode)
            || (2 === $pass && '306347' === $sortCode)
            || (2 === $pass && '306354' <= $sortCode && $sortCode <= '306355')
            || (2 === $pass && '306357' === $sortCode)
            || (2 === $pass && '306359' === $sortCode)
            || (2 === $pass && '306364' === $sortCode)
            || (2 === $pass && '306394' === $sortCode)
            || (2 === $pass && '306397' === $sortCode)
            || (2 === $pass && '306410' === $sortCode)
            || (2 === $pass && '306412' === $sortCode)
            || (2 === $pass && '306414' <= $sortCode && $sortCode <= '306415')
            || (2 === $pass && '306418' <= $sortCode && $sortCode <= '306419')
            || (2 === $pass && '306422' === $sortCode)
            || (2 === $pass && '306434' === $sortCode)
            || (2 === $pass && '306437' <= $sortCode && $sortCode <= '306438')
            || (2 === $pass && '306442' <= $sortCode && $sortCode <= '306444')
            || (2 === $pass && '306457' === $sortCode)
            || (2 === $pass && '306472' === $sortCode)
            || (2 === $pass && '306479' === $sortCode)
            || (2 === $pass && '306497' === $sortCode)
            || (2 === $pass && '306521' <= $sortCode && $sortCode <= '306522')
            || (2 === $pass && '306537' <= $sortCode && $sortCode <= '306539')
            || (2 === $pass && '306541' === $sortCode)
            || (2 === $pass && '306549' === $sortCode)
            || (2 === $pass && '306562' <= $sortCode && $sortCode <= '306565')
            || (2 === $pass && '306572' === $sortCode)
            || (2 === $pass && '306585' <= $sortCode && $sortCode <= '306586')
            || (2 === $pass && '306592' <= $sortCode && $sortCode <= '306593')
            || (2 === $pass && '306675' <= $sortCode && $sortCode <= '306677')
            || (2 === $pass && '306689' === $sortCode)
            || (2 === $pass && '306695' <= $sortCode && $sortCode <= '306696')
            || (2 === $pass && '306733' <= $sortCode && $sortCode <= '306735')
            || (2 === $pass && '306747' <= $sortCode && $sortCode <= '306749')
            || (2 === $pass && '306753' === $sortCode)
            || (2 === $pass && '306756' === $sortCode)
            || (2 === $pass && '306759' === $sortCode)
            || (2 === $pass && '306762' === $sortCode)
            || (2 === $pass && '306764' === $sortCode)
            || (2 === $pass && '306766' <= $sortCode && $sortCode <= '306767')
            || (2 === $pass && '306769' === $sortCode)
            || (2 === $pass && '306772' === $sortCode)
            || (2 === $pass && '306775' <= $sortCode && $sortCode <= '306776')
            || (2 === $pass && '306779' === $sortCode)
            || (2 === $pass && '306782' === $sortCode)
            || (2 === $pass && '306788' <= $sortCode && $sortCode <= '306789')
            || (2 === $pass && '306799' === $sortCode)
            || (2 === $pass && '307184' === $sortCode)
            || (2 === $pass && '307188' <= $sortCode && $sortCode <= '307190')
            || (2 === $pass && '307198' === $sortCode)
            || (2 === $pass && '307271' === $sortCode)
            || (2 === $pass && '307274' === $sortCode)
            || (2 === $pass && '307654' === $sortCode)
            || (2 === $pass && '307779' === $sortCode)
            || (2 === $pass && '307788' <= $sortCode && $sortCode <= '307789')
            || (2 === $pass && '307809' === $sortCode)
            || (2 === $pass && '308012' === $sortCode)
            || (2 === $pass && '308016' === $sortCode)
            || (2 === $pass && '308026' <= $sortCode && $sortCode <= '308027')
            || (2 === $pass && '308033' <= $sortCode && $sortCode <= '308034')
            || (2 === $pass && '308037' === $sortCode)
            || (2 === $pass && '308042' === $sortCode)
            || (2 === $pass && '308045' === $sortCode)
            || (2 === $pass && '308048' <= $sortCode && $sortCode <= '308049')
            || (2 === $pass && '308054' <= $sortCode && $sortCode <= '308055')
            || (2 === $pass && '308063' === $sortCode)
            || (2 === $pass && '308076' <= $sortCode && $sortCode <= '308077')
            || (2 === $pass && '308082' <= $sortCode && $sortCode <= '308083')
            || (2 === $pass && '308085' === $sortCode)
            || (2 === $pass && '308087' <= $sortCode && $sortCode <= '308089')
            || (2 === $pass && '308095' <= $sortCode && $sortCode <= '308097')
            || (2 === $pass && '308404' === $sortCode)
            || (2 === $pass && '308412' === $sortCode)
            || (2 === $pass && '308420' <= $sortCode && $sortCode <= '308427')
            || (2 === $pass && '308433' <= $sortCode && $sortCode <= '308434')
            || (2 === $pass && '308441' <= $sortCode && $sortCode <= '308446')
            || (2 === $pass && '308448' === $sortCode)
            || (2 === $pass && '308451' <= $sortCode && $sortCode <= '308454')
            || (2 === $pass && '308457' <= $sortCode && $sortCode <= '308459')
            || (2 === $pass && '308462' <= $sortCode && $sortCode <= '308463')
            || (2 === $pass && '308467' <= $sortCode && $sortCode <= '308469')
            || (2 === $pass && '308472' <= $sortCode && $sortCode <= '308473')
            || (2 === $pass && '308475' <= $sortCode && $sortCode <= '308477')
            || (2 === $pass && '308479' === $sortCode)
            || (2 === $pass && '308482' === $sortCode)
            || (2 === $pass && '308484' <= $sortCode && $sortCode <= '308487')
            || (2 === $pass && '308784' === $sortCode)
            || (2 === $pass && '308804' === $sortCode)
            || (2 === $pass && '308822' === $sortCode)
            || (2 === $pass && '308952' === $sortCode)
            || (2 === $pass && '309001' <= $sortCode && $sortCode <= '309633')
            || (2 === $pass && '309635' <= $sortCode && $sortCode <= '309746')
            || (2 === $pass && '309748' <= $sortCode && $sortCode <= '309871')
            || (2 === $pass && '309873' <= $sortCode && $sortCode <= '309915')
            || (2 === $pass && '309917' <= $sortCode && $sortCode <= '309999')
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 1, 7, 6, 5, 4, 3, 2, 1], 9];
        }

        if (
               (1 === $pass && '300050' <= $sortCode && $sortCode <= '300051')
            || (1 === $pass && '301022' === $sortCode)
            || (1 === $pass && '301027' === $sortCode)
            || (1 === $pass && '301137' === $sortCode)
            || (1 === $pass && '301142' === $sortCode)
            || (1 === $pass && '301154' <= $sortCode && $sortCode <= '301155')
            || (1 === $pass && '301166' === $sortCode)
            || (1 === $pass && '301170' === $sortCode)
            || (1 === $pass && '301433' === $sortCode)
            || (1 === $pass && '301435' === $sortCode)
            || (1 === $pass && '301439' === $sortCode)
            || (1 === $pass && '301443' === $sortCode)
            || (1 === $pass && '301458' === $sortCode)
            || (1 === $pass && '301463' === $sortCode)
            || (1 === $pass && '301466' === $sortCode)
            || (1 === $pass && '301474' === $sortCode)
            || (1 === $pass && '301482' === $sortCode)
            || (1 === $pass && '301485' === $sortCode)
            || (1 === $pass && '301487' === $sortCode)
            || (1 === $pass && '301510' === $sortCode)
            || (1 === $pass && '301514' === $sortCode)
            || (1 === $pass && '301517' === $sortCode)
            || (1 === $pass && '301525' === $sortCode)
            || (1 === $pass && '301573' === $sortCode)
            || (1 === $pass && '301607' === $sortCode)
            || (1 === $pass && '301657' === $sortCode)
            || (1 === $pass && '301705' === $sortCode)
            || (1 === $pass && '900000' <= $sortCode && $sortCode <= '902396')
            || (1 === $pass && '902398' <= $sortCode && $sortCode <= '909999')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 128, 64, 32, 16, 8, 4, 2, 1], 0];
        }

        if (
               (1 === $pass && '300161' === $sortCode)
            || (1 === $pass && '300176' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 5, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '309634' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 1, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '400515' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 8, 5, 7, 3, 4, 9, 2, 1], 0];
        }

        if (
               (1 === $pass && '406420' === $sortCode)
            || (1 === $pass && '608316' === $sortCode)
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 0, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '609599' === $sortCode)
            || (1 === $pass && '839147' === $sortCode)
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 0, 0, 5, 7, 5, 2, 1, 2, 1], 0];
        }

        if (
               (1 === $pass && '770100' <= $sortCode && $sortCode <= '771799')
            || (1 === $pass && '771877' === $sortCode)
            || (1 === $pass && '771900' <= $sortCode && $sortCode <= '772799')
            || (1 === $pass && '772813' <= $sortCode && $sortCode <= '772817')
            || (1 === $pass && '772901' <= $sortCode && $sortCode <= '773999')
            || (1 === $pass && '774100' <= $sortCode && $sortCode <= '774599')
            || (1 === $pass && '774700' <= $sortCode && $sortCode <= '774830')
            || (1 === $pass && '774832' <= $sortCode && $sortCode <= '777789')
            || (1 === $pass && '777791' <= $sortCode && $sortCode <= '777999')
            || (1 === $pass && '778001' === $sortCode)
            || (1 === $pass && '778300' <= $sortCode && $sortCode <= '778799')
            || (1 === $pass && '778855' === $sortCode)
            || (1 === $pass && '778900' <= $sortCode && $sortCode <= '779174')
            || (1 === $pass && '779414' <= $sortCode && $sortCode <= '779999')
        ) {
            return ['MOD11', [0, 0, 1, 2, 5, 3, 6, 4, 8, 7, 10, 9, 3, 1], 7];
        }

        if (
               (1 === $pass && '820000' <= $sortCode && $sortCode <= '826917')
            || (1 === $pass && '826919' <= $sortCode && $sortCode <= '827999')
            || (1 === $pass && '829000' <= $sortCode && $sortCode <= '829999')
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 0, 0, 7, 3, 4, 9, 2, 1], 0];
        }

        if (
               (2 === $pass && '820000' <= $sortCode && $sortCode <= '826917')
            || (2 === $pass && '826919' <= $sortCode && $sortCode <= '827999')
            || (2 === $pass && '829000' <= $sortCode && $sortCode <= '829999')
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 3];
        }

        if (
               (1 === $pass && '830000' <= $sortCode && $sortCode <= '835700')
            || (1 === $pass && '836500' <= $sortCode && $sortCode <= '836501')
            || (1 === $pass && '836505' <= $sortCode && $sortCode <= '836506')
            || (1 === $pass && '836510' === $sortCode)
            || (1 === $pass && '836515' === $sortCode)
            || (1 === $pass && '836530' === $sortCode)
            || (1 === $pass && '836535' === $sortCode)
            || (1 === $pass && '836540' === $sortCode)
            || (1 === $pass && '836560' === $sortCode)
            || (1 === $pass && '836565' === $sortCode)
            || (1 === $pass && '836570' === $sortCode)
            || (1 === $pass && '836585' === $sortCode)
            || (1 === $pass && '836590' === $sortCode)
            || (1 === $pass && '836595' === $sortCode)
            || (1 === $pass && '836620' === $sortCode)
            || (1 === $pass && '836625' === $sortCode)
            || (1 === $pass && '836630' === $sortCode)
            || (1 === $pass && '837550' === $sortCode)
            || (1 === $pass && '837560' === $sortCode)
            || (1 === $pass && '837570' === $sortCode)
            || (1 === $pass && '837580' === $sortCode)
        ) {
            return ['MOD11', [0, 0, 4, 3, 2, 7, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
               (1 === $pass && '870000' <= $sortCode && $sortCode <= '872791')
            || (1 === $pass && '872793' <= $sortCode && $sortCode <= '876899')
            || (1 === $pass && '876919' === $sortCode)
            || (1 === $pass && '876921' <= $sortCode && $sortCode <= '876923')
            || (1 === $pass && '876925' <= $sortCode && $sortCode <= '876932')
            || (1 === $pass && '876935' === $sortCode)
            || (1 === $pass && '876951' === $sortCode)
            || (1 === $pass && '876953' <= $sortCode && $sortCode <= '876955')
            || (1 === $pass && '876957' === $sortCode)
            || (1 === $pass && '876961' <= $sortCode && $sortCode <= '876965')
            || (1 === $pass && '877000' <= $sortCode && $sortCode <= '877070')
            || (1 === $pass && '877071' === $sortCode)
            || (1 === $pass && '877078' === $sortCode)
            || (1 === $pass && '877088' === $sortCode)
            || (1 === $pass && '877090' === $sortCode)
            || (1 === $pass && '877098' === $sortCode)
            || (1 === $pass && '877099' <= $sortCode && $sortCode <= '879999')
        ) {
            return ['MOD11', [0, 0, 1, 2, 5, 3, 6, 4, 8, 7, 10, 9, 3, 1], 10];
        }

        if (
               (2 === $pass && '870000' <= $sortCode && $sortCode <= '872791')
            || (2 === $pass && '872793' <= $sortCode && $sortCode <= '876899')
            || (2 === $pass && '876919' === $sortCode)
            || (2 === $pass && '876921' <= $sortCode && $sortCode <= '876923')
            || (2 === $pass && '876925' <= $sortCode && $sortCode <= '876932')
            || (2 === $pass && '876935' === $sortCode)
            || (2 === $pass && '876951' === $sortCode)
            || (2 === $pass && '876953' <= $sortCode && $sortCode <= '876955')
            || (2 === $pass && '876957' === $sortCode)
            || (2 === $pass && '876961' <= $sortCode && $sortCode <= '876965')
            || (2 === $pass && '877000' <= $sortCode && $sortCode <= '877070')
            || (2 === $pass && '877071' === $sortCode)
            || (2 === $pass && '877078' === $sortCode)
            || (2 === $pass && '877088' === $sortCode)
            || (2 === $pass && '877090' === $sortCode)
            || (2 === $pass && '877098' === $sortCode)
            || (2 === $pass && '877099' <= $sortCode && $sortCode <= '879999')
        ) {
            return ['MOD11', [0, 0, 5, 10, 9, 8, 0, 7, 6, 5, 4, 3, 2, 1], 11];
        }

        if (
               (2 === $pass && '900000' <= $sortCode && $sortCode <= '902396')
            || (2 === $pass && '902398' <= $sortCode && $sortCode <= '909999')
        ) {
            return ['MOD11', [32, 16, 8, 4, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0], 0];
        }

        if (
               (1 === $pass && '938000' <= $sortCode && $sortCode <= '938696')
            || (1 === $pass && '938698' <= $sortCode && $sortCode <= '938999')
        ) {
            return ['MOD11', [7, 6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2, 0, 0], 5];
        }

        if (
               (2 === $pass && '938000' <= $sortCode && $sortCode <= '938696')
            || (2 === $pass && '938698' <= $sortCode && $sortCode <= '938999')
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 0], 5];
        }
    }
}
