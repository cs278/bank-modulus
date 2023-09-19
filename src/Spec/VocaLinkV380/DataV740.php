<?php

namespace Cs278\BankModulus\Spec\VocaLinkV380;

/**
 * @generated Generated automatically using Cs278\BankModulus\Spec\VocaLinkV380\Generator
 * @internal This class is not part of the public API of this package
 */
final class DataV740 implements DataInterface
{
    /** @internal */
    final public function fetchRecord($sortCode, $pass)
    {
        if (
            1 === $pass
            && (
                   ('010004' <= $sortCode && $sortCode <= '016715')
                || ('040072' <= $sortCode && $sortCode <= '040073')
                || ('040074' <= $sortCode && $sortCode <= '040075')
                || ('040083' <= $sortCode && $sortCode <= '040085')
                || '040086' === $sortCode
                || '040340' === $sortCode
                || ('040390' <= $sortCode && $sortCode <= '040393')
                || '041312' === $sortCode
                || ('041317' <= $sortCode && $sortCode <= '041319')
                || ('042900' <= $sortCode && $sortCode <= '042909')
                || ('100000' <= $sortCode && $sortCode <= '101099')
                || ('101101' <= $sortCode && $sortCode <= '101498')
                || ('101500' <= $sortCode && $sortCode <= '101999')
                || ('102400' <= $sortCode && $sortCode <= '107999')
                || ('108100' <= $sortCode && $sortCode <= '109999')
                || '302880' === $sortCode
                || ('500000' <= $sortCode && $sortCode <= '501029')
                || ('502101' <= $sortCode && $sortCode <= '560070')
                || ('600000' <= $sortCode && $sortCode <= '600108')
                || ('600110' <= $sortCode && $sortCode <= '600124')
                || ('600127' <= $sortCode && $sortCode <= '600142')
                || ('600144' <= $sortCode && $sortCode <= '600149')
                || ('600180' <= $sortCode && $sortCode <= '600304')
                || ('600307' <= $sortCode && $sortCode <= '600312')
                || ('600314' <= $sortCode && $sortCode <= '600355')
                || ('600357' <= $sortCode && $sortCode <= '600851')
                || ('600901' <= $sortCode && $sortCode <= '601360')
                || ('601403' <= $sortCode && $sortCode <= '608028')
                || '608370' === $sortCode
                || '608385' === $sortCode
                || ('608387' <= $sortCode && $sortCode <= '608389')
                || '608400' === $sortCode
                || '608410' === $sortCode
                || '640001' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '040003' === $sortCode
                || '040005' === $sortCode
            )
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '040004' === $sortCode
            )
        ) {
            return ['DBLAL', [0, 0, 0, 0, 0, 0, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '040006' === $sortCode
            )
        ) {
            return ['DBLAL', [0, 3, 0, 0, 0, 3, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '040008' === $sortCode
            )
        ) {
            return ['DBLAL', [0, 3, 0, 0, 0, 4, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            (
                1 === $pass
                && (
                       ('040010' <= $sortCode && $sortCode <= '040014')
                    || '040015' === $sortCode
                    || ('040024' <= $sortCode && $sortCode <= '040039')
                    || '185003' === $sortCode
                    || ('185005' <= $sortCode && $sortCode <= '185009')
                    || ('185011' <= $sortCode && $sortCode <= '185025')
                    || ('185027' <= $sortCode && $sortCode <= '185099')
                    || '230338' === $sortCode
                    || '230614' === $sortCode
                    || '230709' === $sortCode
                    || '230872' === $sortCode
                    || '230933' === $sortCode
                    || '231018' === $sortCode
                    || '231213' === $sortCode
                    || '231228' === $sortCode
                    || '231354' === $sortCode
                    || '231469' === $sortCode
                    || '231536' === $sortCode
                    || '231558' === $sortCode
                    || '231618' === $sortCode
                    || '231679' === $sortCode
                    || '231843' === $sortCode
                    || '231985' === $sortCode
                    || '232130' === $sortCode
                    || '232279' === $sortCode
                    || '232283' === $sortCode
                    || '232290' === $sortCode
                    || '232445' === $sortCode
                    || '232571' === $sortCode
                    || '232636' === $sortCode
                    || '232704' === $sortCode
                    || '232725' === $sortCode
                    || '232813' === $sortCode
                    || '232939' === $sortCode
                    || '233080' === $sortCode
                    || '233135' === $sortCode
                    || '233171' === $sortCode
                    || '233188' === $sortCode
                    || '233231' === $sortCode
                    || '233344' === $sortCode
                    || '233438' === $sortCode
                    || '233556' === $sortCode
                    || '233658' === $sortCode
                    || '233693' === $sortCode
                    || '233752' === $sortCode
                    || '234035' === $sortCode
                    || '234036' === $sortCode
                    || '234037' === $sortCode
                    || '234081' === $sortCode
                    || '234193' === $sortCode
                    || '234252' === $sortCode
                    || '234321' === $sortCode
                    || '234377' === $sortCode
                    || '234570' === $sortCode
                    || '234666' === $sortCode
                    || '234779' === $sortCode
                    || '234828' === $sortCode
                    || '234985' === $sortCode
                    || '235054' === $sortCode
                    || '235164' === $sortCode
                    || '235262' === $sortCode
                    || '235323' === $sortCode
                    || '235459' === $sortCode
                    || '235519' === $sortCode
                    || '235676' === $sortCode
                    || '235711' === $sortCode
                    || '235756' === $sortCode
                    || '235945' === $sortCode
                    || '236006' === $sortCode
                    || '236119' === $sortCode
                    || '236233' === $sortCode
                    || '236293' === $sortCode
                    || '236422' === $sortCode
                    || '236527' === $sortCode
                    || '236538' === $sortCode
                    || '236643' === $sortCode
                    || '236761' === $sortCode
                    || '236907' === $sortCode
                    || '237130' === $sortCode
                    || '237265' === $sortCode
                    || '237355' === $sortCode
                    || '237423' === $sortCode
                    || '237427' === $sortCode
                    || '237563' === $sortCode
                    || '237622' === $sortCode
                    || '237728' === $sortCode
                    || '237873' === $sortCode
                    || '238020' === $sortCode
                    || '238043' === $sortCode
                    || '238051' === $sortCode
                    || '238175' === $sortCode
                    || '238257' === $sortCode
                    || '238432' === $sortCode
                    || '238599' === $sortCode
                    || '238613' === $sortCode
                    || '238672' === $sortCode
                    || '238717' === $sortCode
                    || '238908' === $sortCode
                    || '239071' === $sortCode
                    || '239126' === $sortCode
                    || '239295' === $sortCode
                    || '239360' === $sortCode
                    || '239380' === $sortCode
                    || '239435' === $sortCode
                    || '239525' === $sortCode
                    || '239642' === $sortCode
                    || '239751' === $sortCode
                    || ('400000' <= $sortCode && $sortCode <= '400193')
                    || ('400194' <= $sortCode && $sortCode <= '400195')
                    || ('400196' <= $sortCode && $sortCode <= '400514')
                    || ('400516' <= $sortCode && $sortCode <= '401054')
                    || ('401056' <= $sortCode && $sortCode <= '401198')
                    || ('401200' <= $sortCode && $sortCode <= '401265')
                    || ('401267' <= $sortCode && $sortCode <= '401275')
                    || ('401280' <= $sortCode && $sortCode <= '401899')
                    || ('401901' <= $sortCode && $sortCode <= '401949')
                    || ('401951' <= $sortCode && $sortCode <= '404374')
                    || ('404385' <= $sortCode && $sortCode <= '404799')
                    || ('950000' <= $sortCode && $sortCode <= '950002')
                    || ('950004' <= $sortCode && $sortCode <= '950479')
                    || ('950500' <= $sortCode && $sortCode <= '959999')
                )
            )
            ||
            (
                2 === $pass
                && (
                       ('040330' <= $sortCode && $sortCode <= '040334')
                )
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 0, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            (
                2 === $pass
                && (
                       ('040010' <= $sortCode && $sortCode <= '040014')
                    || ('040024' <= $sortCode && $sortCode <= '040039')
                    || '230338' === $sortCode
                    || '230614' === $sortCode
                    || '230709' === $sortCode
                    || '230872' === $sortCode
                    || '230933' === $sortCode
                    || '231018' === $sortCode
                    || '231213' === $sortCode
                    || '231228' === $sortCode
                    || '231354' === $sortCode
                    || '231469' === $sortCode
                    || '231536' === $sortCode
                    || '231558' === $sortCode
                    || '231618' === $sortCode
                    || '231679' === $sortCode
                    || '231843' === $sortCode
                    || '231985' === $sortCode
                    || '232130' === $sortCode
                    || '232279' === $sortCode
                    || '232283' === $sortCode
                    || '232445' === $sortCode
                    || '232571' === $sortCode
                    || '232636' === $sortCode
                    || '232704' === $sortCode
                    || '232725' === $sortCode
                    || '232813' === $sortCode
                    || '232939' === $sortCode
                    || '233080' === $sortCode
                    || '233135' === $sortCode
                    || '233171' === $sortCode
                    || '233188' === $sortCode
                    || '233231' === $sortCode
                    || '233344' === $sortCode
                    || '233438' === $sortCode
                    || '233556' === $sortCode
                    || '233658' === $sortCode
                    || '233693' === $sortCode
                    || '233752' === $sortCode
                    || '234035' === $sortCode
                    || '234036' === $sortCode
                    || '234037' === $sortCode
                    || '234081' === $sortCode
                    || '234193' === $sortCode
                    || '234252' === $sortCode
                    || '234321' === $sortCode
                    || '234377' === $sortCode
                    || '234570' === $sortCode
                    || '234666' === $sortCode
                    || '234779' === $sortCode
                    || '234828' === $sortCode
                    || '234985' === $sortCode
                    || '235054' === $sortCode
                    || '235164' === $sortCode
                    || '235262' === $sortCode
                    || '235323' === $sortCode
                    || '235459' === $sortCode
                    || '235519' === $sortCode
                    || '235676' === $sortCode
                    || '235711' === $sortCode
                    || '235756' === $sortCode
                    || '235945' === $sortCode
                    || '236006' === $sortCode
                    || '236119' === $sortCode
                    || '236233' === $sortCode
                    || '236293' === $sortCode
                    || '236422' === $sortCode
                    || '236527' === $sortCode
                    || '236538' === $sortCode
                    || '236643' === $sortCode
                    || '236761' === $sortCode
                    || '236907' === $sortCode
                    || '237130' === $sortCode
                    || '237265' === $sortCode
                    || '237355' === $sortCode
                    || '237423' === $sortCode
                    || '237427' === $sortCode
                    || '237563' === $sortCode
                    || '237622' === $sortCode
                    || '237728' === $sortCode
                    || '237873' === $sortCode
                    || '238020' === $sortCode
                    || '238043' === $sortCode
                    || '238051' === $sortCode
                    || '238175' === $sortCode
                    || '238257' === $sortCode
                    || ('238392' <= $sortCode && $sortCode <= '238431')
                    || '238432' === $sortCode
                    || ('238433' <= $sortCode && $sortCode <= '238583')
                    || ('238585' <= $sortCode && $sortCode <= '238590')
                    || '238599' === $sortCode
                    || '238613' === $sortCode
                    || '238672' === $sortCode
                    || '238717' === $sortCode
                    || '238908' === $sortCode
                    || '239071' === $sortCode
                    || '239126' === $sortCode
                    || ('239136' <= $sortCode && $sortCode <= '239140')
                    || ('239143' <= $sortCode && $sortCode <= '239144')
                    || ('239282' <= $sortCode && $sortCode <= '239283')
                    || ('239285' <= $sortCode && $sortCode <= '239294')
                    || '239295' === $sortCode
                    || ('239296' <= $sortCode && $sortCode <= '239318')
                    || '239360' === $sortCode
                    || '239380' === $sortCode
                    || '239435' === $sortCode
                    || '239525' === $sortCode
                    || '239642' === $sortCode
                    || '239751' === $sortCode
                    || ('400000' <= $sortCode && $sortCode <= '400193')
                    || ('400194' <= $sortCode && $sortCode <= '400195')
                    || ('400196' <= $sortCode && $sortCode <= '400514')
                    || ('400516' <= $sortCode && $sortCode <= '401054')
                    || ('401056' <= $sortCode && $sortCode <= '401198')
                    || ('401200' <= $sortCode && $sortCode <= '401265')
                    || ('401267' <= $sortCode && $sortCode <= '401275')
                    || ('401280' <= $sortCode && $sortCode <= '401899')
                    || ('401901' <= $sortCode && $sortCode <= '401949')
                    || ('401951' <= $sortCode && $sortCode <= '404374')
                    || ('404385' <= $sortCode && $sortCode <= '404799')
                    || ('839105' <= $sortCode && $sortCode <= '839106')
                    || ('839130' <= $sortCode && $sortCode <= '839131')
                    || ('950000' <= $sortCode && $sortCode <= '950002')
                    || ('950004' <= $sortCode && $sortCode <= '950479')
                    || ('950500' <= $sortCode && $sortCode <= '959999')
                    || ('980000' <= $sortCode && $sortCode <= '980004')
                    || ('980006' <= $sortCode && $sortCode <= '983000')
                    || ('983003' <= $sortCode && $sortCode <= '987000')
                    || ('987004' <= $sortCode && $sortCode <= '989999')
                )
            )
            ||
            (
                1 === $pass
                && (
                       ('040330' <= $sortCode && $sortCode <= '040334')
                    || '230363' === $sortCode
                    || '230364' === $sortCode
                    || '230365' === $sortCode
                    || '230366' === $sortCode
                    || '230367' === $sortCode
                    || '232507' === $sortCode
                    || '236972' === $sortCode
                    || '406453' === $sortCode
                    || '406466' === $sortCode
                )
            )
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('040020' <= $sortCode && $sortCode <= '040023')
                || ('040040' <= $sortCode && $sortCode <= '040059')
                || ('041400' <= $sortCode && $sortCode <= '041449')
            )
        ) {
            return ['MOD11', [0, 2, 0, 0, 9, 1, 2, 8, 4, 3, 7, 5, 6, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '040082' === $sortCode
                || '233456' === $sortCode
                || '235889' === $sortCode
            )
        ) {
            return ['MOD10', [2, 1, 2, 1, 2, 1, 0, 64, 32, 16, 8, 4, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('040300' <= $sortCode && $sortCode <= '040329')
                || '090013' === $sortCode
                || '090105' === $sortCode
                || ('090126' <= $sortCode && $sortCode <= '090129')
                || ('090180' <= $sortCode && $sortCode <= '090185')
                || ('090190' <= $sortCode && $sortCode <= '090196')
                || '090204' === $sortCode
                || '090222' === $sortCode
                || ('090500' <= $sortCode && $sortCode <= '090599')
                || '090704' === $sortCode
                || '090705' === $sortCode
                || '090710' === $sortCode
                || '090715' === $sortCode
                || ('090736' <= $sortCode && $sortCode <= '090739')
                || '090790' === $sortCode
                || '091601' === $sortCode
            )
        ) {
            return ['MOD10', [0, 0, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '040344' === $sortCode
                || ('040350' <= $sortCode && $sortCode <= '040379')
                || ('042927' <= $sortCode && $sortCode <= '042956')
            )
        ) {
            return ['MOD10', [0, 0, 1, 8, 2, 6, 3, 7, 9, 5, 8, 4, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('040400' <= $sortCode && $sortCode <= '041311')
                || ('041313' <= $sortCode && $sortCode <= '041316')
                || ('041320' <= $sortCode && $sortCode <= '041399')
            )
        ) {
            return ['DBLAL', [1, 3, 4, 3, 9, 3, 1, 7, 5, 5, 4, 5, 2, 4], 0];
        }

        if (
            1 === $pass
            && (
                   ('041900' <= $sortCode && $sortCode <= '042099')
            )
        ) {
            return ['MOD10', [1, 3, 4, 3, 9, 3, 1, 7, 5, 5, 4, 5, 2, 4], 0];
        }

        if (
            1 === $pass
            && (
                   ('042100' <= $sortCode && $sortCode <= '042899')
            )
        ) {
            return ['MOD11', [1, 3, 4, 3, 9, 3, 1, 7, 5, 5, 4, 5, 2, 4], 0];
        }

        if (
            1 === $pass
            && (
                   '044001' === $sortCode
            )
        ) {
            return ['MOD10', [0, 2, 1, 2, 0, 7, 1, 1, 0, 3, 8, 1, 9, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('050000' <= $sortCode && $sortCode <= '050020')
                || ('050022' <= $sortCode && $sortCode <= '050094')
                || ('050096' <= $sortCode && $sortCode <= '058999')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 2, 1, 7, 5, 8, 2, 4, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '070030' === $sortCode
                || '070040' === $sortCode
                || '070055' === $sortCode
                || '070066' === $sortCode
                || '070246' === $sortCode
                || '070436' === $sortCode
                || '070806' === $sortCode
                || '070976' === $sortCode
                || '071040' === $sortCode
                || '071096' === $sortCode
                || '071120' === $sortCode
                || '071226' === $sortCode
                || '071306' === $sortCode
                || '071310' === $sortCode
                || '071350' === $sortCode
                || '071490' === $sortCode
                || '071520' === $sortCode
                || '071660' === $sortCode
                || '071986' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 7, 6, 5, 8, 9, 4, 5, 6, 7, 8, 9, -1], 0];
        }

        if (
            1 === $pass
            && (
                   '070116' === $sortCode
                || '074456' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 7, 6, 5, 8, 9, 4, 5, 6, 7, 8, 9, -1], 12];
        }

        if (
            2 === $pass
            && (
                   '070116' === $sortCode
                || '074456' === $sortCode
            )
        ) {
            return ['MOD10', [0, 3, 2, 4, 5, 8, 9, 4, 5, 6, 7, 8, 9, -1], 13];
        }

        if (
            1 === $pass
            && (
                   '080211' === $sortCode
                || '080228' === $sortCode
                || '086001' === $sortCode
                || '086020' === $sortCode
                || ('089000' <= $sortCode && $sortCode <= '089999')
                || '608301' === $sortCode
                || '609593' === $sortCode
            )
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 0, 7, 1, 3, 7, 1, 3, 7, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '086086' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 8, 9, 4, 5, 6, 7, 8, 9, -1], 0];
        }

        if (
            1 === $pass
            && (
                   '086090' === $sortCode
            )
        ) {
            return ['MOD10', [0, 0, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1], 8];
        }

        if (
            1 === $pass
            && (
                   '086119' === $sortCode
                || '230580' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 2, 7, 6, 5, 4, 3, 2, 1], 12];
        }

        if (
            2 === $pass
            && (
                   '086119' === $sortCode
            )
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 0, 2, 3, 1, 0, 5, 2, 6, 1], 13];
        }

        if (
            1 === $pass
            && (
                   '090118' === $sortCode
                || ('160000' <= $sortCode && $sortCode <= '161027')
                || ('161030' <= $sortCode && $sortCode <= '161041')
                || '161050' === $sortCode
                || '161055' === $sortCode
                || '161060' === $sortCode
                || '161065' === $sortCode
                || '161070' === $sortCode
                || '161075' === $sortCode
                || '161080' === $sortCode
                || '161085' === $sortCode
                || '161090' === $sortCode
                || ('161100' <= $sortCode && $sortCode <= '162028')
                || ('162030' <= $sortCode && $sortCode <= '164300')
                || ('165901' <= $sortCode && $sortCode <= '166001')
                || ('166050' <= $sortCode && $sortCode <= '167600')
            )
        ) {
            return ['MOD11', [0, 0, 6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('090131' <= $sortCode && $sortCode <= '090136')
                || ('090150' <= $sortCode && $sortCode <= '090156')
                || '090356' === $sortCode
                || ('090720' <= $sortCode && $sortCode <= '090726')
                || ('720000' <= $sortCode && $sortCode <= '720249')
                || ('720251' <= $sortCode && $sortCode <= '724443')
                || ('725000' <= $sortCode && $sortCode <= '725251')
                || ('725253' <= $sortCode && $sortCode <= '725616')
                || ('726000' <= $sortCode && $sortCode <= '726616')
                || ('890000' <= $sortCode && $sortCode <= '890699')
                || ('891000' <= $sortCode && $sortCode <= '891616')
                || ('892000' <= $sortCode && $sortCode <= '892616')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 9, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '091600' === $sortCode
                || ('091740' <= $sortCode && $sortCode <= '091743')
                || ('091800' <= $sortCode && $sortCode <= '091809')
                || ('091811' <= $sortCode && $sortCode <= '091865')
            )
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 1, 7, 1, 3, 7, 1, 3, 7, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('108000' <= $sortCode && $sortCode <= '108079')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 3, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('108080' <= $sortCode && $sortCode <= '108099')
                || ('238890' <= $sortCode && $sortCode <= '238899')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 4, 3, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('110000' <= $sortCode && $sortCode <= '119280')
                || ('119282' <= $sortCode && $sortCode <= '119283')
                || ('119285' <= $sortCode && $sortCode <= '119999')
            )
        ) {
            return ['DBLAL', [0, 0, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 1];
        }

        if (
            1 === $pass
            && (
                   ('120000' <= $sortCode && $sortCode <= '120961')
                || ('120963' <= $sortCode && $sortCode <= '122009')
                || ('122011' <= $sortCode && $sortCode <= '122101')
                || ('122103' <= $sortCode && $sortCode <= '122129')
                || ('122131' <= $sortCode && $sortCode <= '122135')
                || ('122213' <= $sortCode && $sortCode <= '122299')
                || ('122400' <= $sortCode && $sortCode <= '122999')
                || ('124000' <= $sortCode && $sortCode <= '124999')
                || '236247' === $sortCode
                || ('800000' <= $sortCode && $sortCode <= '802005')
                || ('802007' <= $sortCode && $sortCode <= '802042')
                || ('802044' <= $sortCode && $sortCode <= '802065')
                || ('802067' <= $sortCode && $sortCode <= '802109')
                || ('802111' <= $sortCode && $sortCode <= '802114')
                || ('802116' <= $sortCode && $sortCode <= '802123')
                || ('802151' <= $sortCode && $sortCode <= '802154')
                || ('802156' <= $sortCode && $sortCode <= '802179')
                || ('802181' <= $sortCode && $sortCode <= '803599')
                || ('803609' <= $sortCode && $sortCode <= '819999')
            )
        ) {
            return ['MOD11', [0, 0, 1, 8, 2, 6, 3, 7, 9, 5, 8, 4, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('133000' <= $sortCode && $sortCode <= '133999')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 10, 7, 8, 4, 6, 3, 5, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('134012' <= $sortCode && $sortCode <= '134020')
            )
        ) {
            return ['MOD11', [0, 0, 0, 7, 5, 9, 8, 4, 6, 3, 5, 2, 0, 0], 4];
        }

        if (
            1 === $pass
            && (
                   '134121' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 1, 0, 0, 8, 4, 6, 3, 5, 2, 0, 0], 4];
        }

        if (
            1 === $pass
            && (
                   ('150000' <= $sortCode && $sortCode <= '158000')
            )
        ) {
            return ['MOD11', [4, 3, 0, 0, 0, 0, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '159800' === $sortCode
                || '159900' === $sortCode
                || '159910' === $sortCode
                || ('980000' <= $sortCode && $sortCode <= '980004')
                || ('980006' <= $sortCode && $sortCode <= '983000')
                || ('983003' <= $sortCode && $sortCode <= '987000')
                || ('987004' <= $sortCode && $sortCode <= '989999')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 7, 6, 5, 4, 3, 2, 1, 0], 0];
        }

        if (
            1 === $pass
            && (
                   '161029' === $sortCode
                || '168600' === $sortCode
                || '185004' === $sortCode
                || '233483' === $sortCode
                || '235451' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '180002' === $sortCode
                || '180005' === $sortCode
                || '180009' === $sortCode
                || '180036' === $sortCode
                || '180038' === $sortCode
                || ('180091' <= $sortCode && $sortCode <= '180092')
                || '180104' === $sortCode
                || ('180109' <= $sortCode && $sortCode <= '180110')
                || '180156' === $sortCode
                || '185001' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 8, 7, 6, 5, 4, 3, 2, 1], 14];
        }

        if (
            1 === $pass
            && (
                   ('200000' <= $sortCode && $sortCode <= '200002')
                || '200004' === $sortCode
                || '200026' === $sortCode
                || ('200051' <= $sortCode && $sortCode <= '200077')
                || ('200079' <= $sortCode && $sortCode <= '200097')
                || ('200099' <= $sortCode && $sortCode <= '200156')
                || ('200158' <= $sortCode && $sortCode <= '200387')
                || ('200403' <= $sortCode && $sortCode <= '200405')
                || '200407' === $sortCode
                || ('200411' <= $sortCode && $sortCode <= '200412')
                || ('200414' <= $sortCode && $sortCode <= '200423')
                || ('200425' <= $sortCode && $sortCode <= '200899')
                || ('200901' <= $sortCode && $sortCode <= '201159')
                || ('201161' <= $sortCode && $sortCode <= '201177')
                || ('201179' <= $sortCode && $sortCode <= '201351')
                || ('201353' <= $sortCode && $sortCode <= '202698')
                || ('202700' <= $sortCode && $sortCode <= '203239')
                || ('203241' <= $sortCode && $sortCode <= '203255')
                || ('203259' <= $sortCode && $sortCode <= '203519')
                || ('203521' <= $sortCode && $sortCode <= '204476')
                || ('204478' <= $sortCode && $sortCode <= '205475')
                || ('205477' <= $sortCode && $sortCode <= '205954')
                || ('205956' <= $sortCode && $sortCode <= '206124')
                || ('206126' <= $sortCode && $sortCode <= '206157')
                || ('206159' <= $sortCode && $sortCode <= '206390')
                || ('206392' <= $sortCode && $sortCode <= '206799')
                || ('206802' <= $sortCode && $sortCode <= '206874')
                || ('206876' <= $sortCode && $sortCode <= '207170')
                || ('207173' <= $sortCode && $sortCode <= '208092')
                || ('208094' <= $sortCode && $sortCode <= '208721')
                || ('208723' <= $sortCode && $sortCode <= '209034')
                || ('209036' <= $sortCode && $sortCode <= '209128')
                || ('209130' <= $sortCode && $sortCode <= '209999')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 0, 7, 6, 5, 4, 3, 2, 1], 6];
        }

        if (
            2 === $pass
            && (
                   ('200000' <= $sortCode && $sortCode <= '200002')
                || '200004' === $sortCode
                || '200026' === $sortCode
                || ('200051' <= $sortCode && $sortCode <= '200077')
                || ('200079' <= $sortCode && $sortCode <= '200097')
                || ('200099' <= $sortCode && $sortCode <= '200156')
                || ('200158' <= $sortCode && $sortCode <= '200387')
                || ('200403' <= $sortCode && $sortCode <= '200405')
                || '200407' === $sortCode
                || ('200411' <= $sortCode && $sortCode <= '200412')
                || ('200414' <= $sortCode && $sortCode <= '200423')
                || ('200425' <= $sortCode && $sortCode <= '200899')
                || ('200901' <= $sortCode && $sortCode <= '201159')
                || ('201161' <= $sortCode && $sortCode <= '201177')
                || ('201179' <= $sortCode && $sortCode <= '201351')
                || ('201353' <= $sortCode && $sortCode <= '202698')
                || ('202700' <= $sortCode && $sortCode <= '203239')
                || ('203241' <= $sortCode && $sortCode <= '203255')
                || ('203259' <= $sortCode && $sortCode <= '203519')
                || ('203521' <= $sortCode && $sortCode <= '204476')
                || ('204478' <= $sortCode && $sortCode <= '205475')
                || ('205477' <= $sortCode && $sortCode <= '205954')
                || ('205956' <= $sortCode && $sortCode <= '206124')
                || ('206126' <= $sortCode && $sortCode <= '206157')
                || ('206159' <= $sortCode && $sortCode <= '206390')
                || ('206392' <= $sortCode && $sortCode <= '206799')
                || ('206802' <= $sortCode && $sortCode <= '206874')
                || ('206876' <= $sortCode && $sortCode <= '207170')
                || ('207173' <= $sortCode && $sortCode <= '208092')
                || ('208094' <= $sortCode && $sortCode <= '208721')
                || ('208723' <= $sortCode && $sortCode <= '209034')
                || ('209036' <= $sortCode && $sortCode <= '209128')
                || ('209130' <= $sortCode && $sortCode <= '209999')
            )
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 6];
        }

        if (
            1 === $pass
            && (
                   '230088' === $sortCode
            )
        ) {
            return ['MOD10', [2, 1, 2, 1, 2, 1, 2, 7, 4, 5, 6, 3, 8, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '230120' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 7, 128, 64, 32, 16, 8, 4, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '230121' === $sortCode
            )
        ) {
            return ['MOD11', [8, 7, 1, 5, 8, 6, 1, 7, 6, 5, 5, 4, 9, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '230505' === $sortCode
                || '236802' === $sortCode
            )
        ) {
            return ['MOD11', [9, 8, 7, 6, 5, 4, 9, 8, 7, 6, 5, 4, 3, 2], 0];
        }

        if (
            2 === $pass
            && (
                   '230580' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 5, 7, 6, 5, 4, 3, 2, 1], 13];
        }

        if (
            1 === $pass
            && (
                   '231185' === $sortCode
            )
        ) {
            return ['MOD11', [4, 8, 1, 6, 5, 8, 1, 9, 5, 1, 8, 1, 7, 3], 0];
        }

        if (
            1 === $pass
            && (
                   '231470' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 20, 18, 1, 14, 0, 0, 0, 0, 0, 0, 0, 0], 0];
        }

        if (
            1 === $pass
            && (
                   '233142' === $sortCode
            )
        ) {
            return ['MOD10', [2, 1, 2, 1, 2, 1, 30, 36, 24, 20, 16, 12, 8, 4], 0];
        }

        if (
            1 === $pass
            && (
                   ('238392' <= $sortCode && $sortCode <= '238431')
                || ('238433' <= $sortCode && $sortCode <= '238583')
                || ('238585' <= $sortCode && $sortCode <= '238590')
                || ('239136' <= $sortCode && $sortCode <= '239140')
                || ('239143' <= $sortCode && $sortCode <= '239144')
                || ('239282' <= $sortCode && $sortCode <= '239283')
                || ('239285' <= $sortCode && $sortCode <= '239294')
                || ('239296' <= $sortCode && $sortCode <= '239318')
                || ('839105' <= $sortCode && $sortCode <= '839106')
                || ('839130' <= $sortCode && $sortCode <= '839131')
            )
        ) {
            return ['MOD11', [7, 6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2, 1, 0], 0];
        }

        if (
            1 === $pass
            && (
                   ('300000' <= $sortCode && $sortCode <= '300006')
                || ('300008' <= $sortCode && $sortCode <= '300009')
                || ('300134' <= $sortCode && $sortCode <= '300138')
                || '301001' === $sortCode
                || '301004' === $sortCode
                || '301007' === $sortCode
                || '301012' === $sortCode
                || '301047' === $sortCode
                || '301049' === $sortCode
                || '301052' === $sortCode
                || ('301075' <= $sortCode && $sortCode <= '301076')
                || '301108' === $sortCode
                || '301112' === $sortCode
                || '301127' === $sortCode
                || '301148' === $sortCode
                || '301161' === $sortCode
                || ('301174' <= $sortCode && $sortCode <= '301175')
                || '301191' === $sortCode
                || ('301194' <= $sortCode && $sortCode <= '301195')
                || ('301204' <= $sortCode && $sortCode <= '301205')
                || ('301209' <= $sortCode && $sortCode <= '301210')
                || '301215' === $sortCode
                || '301218' === $sortCode
                || ('301220' <= $sortCode && $sortCode <= '301221')
                || '301234' === $sortCode
                || '301251' === $sortCode
                || '301259' === $sortCode
                || '301274' === $sortCode
                || '301280' === $sortCode
                || '301286' === $sortCode
                || ('301295' <= $sortCode && $sortCode <= '301296')
                || '301299' === $sortCode
                || '301301' === $sortCode
                || '301305' === $sortCode
                || '301318' === $sortCode
                || '301330' === $sortCode
                || '301332' === $sortCode
                || '301335' === $sortCode
                || '301342' === $sortCode
                || ('301350' <= $sortCode && $sortCode <= '301355')
                || '301364' === $sortCode
                || '301368' === $sortCode
                || '301376' === $sortCode
                || '301380' === $sortCode
                || '301388' === $sortCode
                || '301390' === $sortCode
                || '301395' === $sortCode
                || '301400' === $sortCode
                || '301424' === $sortCode
                || '301432' === $sortCode
                || '301437' === $sortCode
                || '301440' === $sortCode
                || '301444' === $sortCode
                || '301447' === $sortCode
                || '301451' === $sortCode
                || '301456' === $sortCode
                || '301460' === $sortCode
                || '301464' === $sortCode
                || '301469' === $sortCode
                || '301471' === $sortCode
                || '301477' === $sortCode
                || '301483' === $sortCode
                || '301504' === $sortCode
                || '301539' === $sortCode
                || '301542' === $sortCode
                || ('301552' <= $sortCode && $sortCode <= '301553')
                || '301557' === $sortCode
                || '301593' === $sortCode
                || '301595' === $sortCode
                || '301597' === $sortCode
                || '301599' === $sortCode
                || '301609' === $sortCode
                || '301611' === $sortCode
                || '301620' === $sortCode
                || '301628' === $sortCode
                || '301634' === $sortCode
                || ('301641' <= $sortCode && $sortCode <= '301642')
                || '301653' === $sortCode
                || '301662' === $sortCode
                || '301664' === $sortCode
                || '301670' === $sortCode
                || '301674' === $sortCode
                || '301684' === $sortCode
                || ('301695' <= $sortCode && $sortCode <= '301696')
                || ('301700' <= $sortCode && $sortCode <= '301702')
                || '301712' === $sortCode
                || '301716' === $sortCode
                || '301748' === $sortCode
                || '301773' === $sortCode
                || '301777' === $sortCode
                || '301780' === $sortCode
                || '301785' === $sortCode
                || '301803' === $sortCode
                || '301805' === $sortCode
                || '301806' === $sortCode
                || '301816' === $sortCode
                || '301825' === $sortCode
                || '301830' === $sortCode
                || '301834' === $sortCode
                || '301843' === $sortCode
                || '301845' === $sortCode
                || ('301855' <= $sortCode && $sortCode <= '301856')
                || '301864' === $sortCode
                || ('301868' <= $sortCode && $sortCode <= '301869')
                || '301883' === $sortCode
                || ('301886' <= $sortCode && $sortCode <= '301888')
                || '301898' === $sortCode
                || ('301914' <= $sortCode && $sortCode <= '301996')
                || '302500' === $sortCode
                || '302556' === $sortCode
                || ('302579' <= $sortCode && $sortCode <= '302580')
                || ('303460' <= $sortCode && $sortCode <= '303461')
                || ('305907' <= $sortCode && $sortCode <= '305939')
                || ('305941' <= $sortCode && $sortCode <= '305960')
                || '305971' === $sortCode
                || '305974' === $sortCode
                || '305978' === $sortCode
                || '305982' === $sortCode
                || ('305984' <= $sortCode && $sortCode <= '305988')
                || ('305990' <= $sortCode && $sortCode <= '305993')
                || ('306017' <= $sortCode && $sortCode <= '306018')
                || '306020' === $sortCode
                || '306028' === $sortCode
                || '306038' === $sortCode
                || ('306150' <= $sortCode && $sortCode <= '306151')
                || ('306154' <= $sortCode && $sortCode <= '306155')
                || '306228' === $sortCode
                || '306229' === $sortCode
                || '306232' === $sortCode
                || '306242' === $sortCode
                || '306245' === $sortCode
                || '306249' === $sortCode
                || '306255' === $sortCode
                || ('306259' <= $sortCode && $sortCode <= '306263')
                || ('306272' <= $sortCode && $sortCode <= '306279')
                || '306281' === $sortCode
                || '306289' === $sortCode
                || '306296' === $sortCode
                || '306299' === $sortCode
                || '306300' === $sortCode
                || '306347' === $sortCode
                || ('306354' <= $sortCode && $sortCode <= '306355')
                || '306357' === $sortCode
                || '306359' === $sortCode
                || '306364' === $sortCode
                || '306394' === $sortCode
                || '306397' === $sortCode
                || '306410' === $sortCode
                || '306412' === $sortCode
                || ('306414' <= $sortCode && $sortCode <= '306415')
                || ('306418' <= $sortCode && $sortCode <= '306419')
                || '306422' === $sortCode
                || '306434' === $sortCode
                || ('306437' <= $sortCode && $sortCode <= '306438')
                || ('306442' <= $sortCode && $sortCode <= '306444')
                || '306457' === $sortCode
                || '306472' === $sortCode
                || '306479' === $sortCode
                || '306497' === $sortCode
                || ('306521' <= $sortCode && $sortCode <= '306522')
                || ('306537' <= $sortCode && $sortCode <= '306539')
                || '306541' === $sortCode
                || '306549' === $sortCode
                || ('306562' <= $sortCode && $sortCode <= '306565')
                || '306572' === $sortCode
                || ('306585' <= $sortCode && $sortCode <= '306586')
                || ('306592' <= $sortCode && $sortCode <= '306593')
                || ('306675' <= $sortCode && $sortCode <= '306677')
                || '306689' === $sortCode
                || ('306695' <= $sortCode && $sortCode <= '306696')
                || ('306733' <= $sortCode && $sortCode <= '306735')
                || ('306747' <= $sortCode && $sortCode <= '306749')
                || '306753' === $sortCode
                || '306756' === $sortCode
                || '306759' === $sortCode
                || '306762' === $sortCode
                || '306764' === $sortCode
                || ('306766' <= $sortCode && $sortCode <= '306767')
                || '306769' === $sortCode
                || '306772' === $sortCode
                || ('306775' <= $sortCode && $sortCode <= '306776')
                || '306779' === $sortCode
                || '306782' === $sortCode
                || ('306788' <= $sortCode && $sortCode <= '306789')
                || '306799' === $sortCode
                || '307184' === $sortCode
                || ('307188' <= $sortCode && $sortCode <= '307190')
                || '307198' === $sortCode
                || '307271' === $sortCode
                || '307274' === $sortCode
                || '307654' === $sortCode
                || '307779' === $sortCode
                || ('307788' <= $sortCode && $sortCode <= '307789')
                || '307809' === $sortCode
                || '308012' === $sortCode
                || '308016' === $sortCode
                || ('308026' <= $sortCode && $sortCode <= '308027')
                || ('308033' <= $sortCode && $sortCode <= '308034')
                || '308037' === $sortCode
                || '308042' === $sortCode
                || '308045' === $sortCode
                || ('308048' <= $sortCode && $sortCode <= '308049')
                || ('308054' <= $sortCode && $sortCode <= '308055')
                || '308063' === $sortCode
                || ('308076' <= $sortCode && $sortCode <= '308077')
                || ('308082' <= $sortCode && $sortCode <= '308083')
                || '308085' === $sortCode
                || ('308087' <= $sortCode && $sortCode <= '308089')
                || ('308095' <= $sortCode && $sortCode <= '308097')
                || '308404' === $sortCode
                || '308412' === $sortCode
                || ('308420' <= $sortCode && $sortCode <= '308427')
                || ('308433' <= $sortCode && $sortCode <= '308434')
                || ('308441' <= $sortCode && $sortCode <= '308446')
                || '308448' === $sortCode
                || ('308451' <= $sortCode && $sortCode <= '308454')
                || ('308457' <= $sortCode && $sortCode <= '308459')
                || ('308462' <= $sortCode && $sortCode <= '308463')
                || ('308467' <= $sortCode && $sortCode <= '308469')
                || ('308472' <= $sortCode && $sortCode <= '308473')
                || ('308475' <= $sortCode && $sortCode <= '308477')
                || '308479' === $sortCode
                || '308482' === $sortCode
                || ('308484' <= $sortCode && $sortCode <= '308487')
                || '308784' === $sortCode
                || '308804' === $sortCode
                || '308822' === $sortCode
                || '308952' === $sortCode
                || ('309001' <= $sortCode && $sortCode <= '309633')
                || ('309635' <= $sortCode && $sortCode <= '309746')
                || ('309748' <= $sortCode && $sortCode <= '309871')
                || ('309873' <= $sortCode && $sortCode <= '309915')
                || ('309917' <= $sortCode && $sortCode <= '309999')
            )
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 5, 7, 6, 5, 4, 3, 2, 1], 2];
        }

        if (
            2 === $pass
            && (
                   ('300000' <= $sortCode && $sortCode <= '300006')
                || ('300008' <= $sortCode && $sortCode <= '300009')
                || ('300134' <= $sortCode && $sortCode <= '300138')
                || '301001' === $sortCode
                || '301004' === $sortCode
                || '301007' === $sortCode
                || '301012' === $sortCode
                || '301047' === $sortCode
                || '301049' === $sortCode
                || '301052' === $sortCode
                || ('301075' <= $sortCode && $sortCode <= '301076')
                || '301108' === $sortCode
                || '301112' === $sortCode
                || '301127' === $sortCode
                || '301148' === $sortCode
                || '301161' === $sortCode
                || ('301174' <= $sortCode && $sortCode <= '301175')
                || '301191' === $sortCode
                || ('301194' <= $sortCode && $sortCode <= '301195')
                || ('301204' <= $sortCode && $sortCode <= '301205')
                || ('301209' <= $sortCode && $sortCode <= '301210')
                || '301215' === $sortCode
                || '301218' === $sortCode
                || ('301220' <= $sortCode && $sortCode <= '301221')
                || '301234' === $sortCode
                || '301251' === $sortCode
                || '301259' === $sortCode
                || '301274' === $sortCode
                || '301280' === $sortCode
                || '301286' === $sortCode
                || ('301295' <= $sortCode && $sortCode <= '301296')
                || '301299' === $sortCode
                || '301301' === $sortCode
                || '301305' === $sortCode
                || '301318' === $sortCode
                || '301330' === $sortCode
                || '301332' === $sortCode
                || '301335' === $sortCode
                || '301342' === $sortCode
                || ('301350' <= $sortCode && $sortCode <= '301355')
                || '301364' === $sortCode
                || '301368' === $sortCode
                || '301376' === $sortCode
                || '301380' === $sortCode
                || '301388' === $sortCode
                || '301390' === $sortCode
                || '301395' === $sortCode
                || '301400' === $sortCode
                || '301424' === $sortCode
                || '301432' === $sortCode
                || '301437' === $sortCode
                || '301440' === $sortCode
                || '301444' === $sortCode
                || '301447' === $sortCode
                || '301451' === $sortCode
                || '301456' === $sortCode
                || '301460' === $sortCode
                || '301464' === $sortCode
                || '301469' === $sortCode
                || '301471' === $sortCode
                || '301477' === $sortCode
                || '301483' === $sortCode
                || '301504' === $sortCode
                || '301539' === $sortCode
                || '301542' === $sortCode
                || ('301552' <= $sortCode && $sortCode <= '301553')
                || '301557' === $sortCode
                || '301593' === $sortCode
                || '301595' === $sortCode
                || '301597' === $sortCode
                || '301599' === $sortCode
                || '301609' === $sortCode
                || '301611' === $sortCode
                || '301620' === $sortCode
                || '301628' === $sortCode
                || '301634' === $sortCode
                || ('301641' <= $sortCode && $sortCode <= '301642')
                || '301653' === $sortCode
                || '301662' === $sortCode
                || '301664' === $sortCode
                || '301670' === $sortCode
                || '301674' === $sortCode
                || '301684' === $sortCode
                || ('301695' <= $sortCode && $sortCode <= '301696')
                || ('301700' <= $sortCode && $sortCode <= '301702')
                || '301712' === $sortCode
                || '301716' === $sortCode
                || '301748' === $sortCode
                || '301773' === $sortCode
                || '301777' === $sortCode
                || '301780' === $sortCode
                || '301785' === $sortCode
                || '301803' === $sortCode
                || '301805' === $sortCode
                || '301806' === $sortCode
                || '301816' === $sortCode
                || '301825' === $sortCode
                || '301830' === $sortCode
                || '301834' === $sortCode
                || '301843' === $sortCode
                || '301845' === $sortCode
                || ('301855' <= $sortCode && $sortCode <= '301856')
                || '301864' === $sortCode
                || ('301868' <= $sortCode && $sortCode <= '301869')
                || '301883' === $sortCode
                || ('301886' <= $sortCode && $sortCode <= '301888')
                || '301898' === $sortCode
                || ('301914' <= $sortCode && $sortCode <= '301996')
                || '302500' === $sortCode
                || '302556' === $sortCode
                || ('302579' <= $sortCode && $sortCode <= '302580')
                || ('303460' <= $sortCode && $sortCode <= '303461')
                || ('305907' <= $sortCode && $sortCode <= '305939')
                || ('305941' <= $sortCode && $sortCode <= '305960')
                || '305971' === $sortCode
                || '305974' === $sortCode
                || '305978' === $sortCode
                || '305982' === $sortCode
                || ('305984' <= $sortCode && $sortCode <= '305988')
                || ('305990' <= $sortCode && $sortCode <= '305993')
                || ('306017' <= $sortCode && $sortCode <= '306018')
                || '306020' === $sortCode
                || '306028' === $sortCode
                || '306038' === $sortCode
                || ('306150' <= $sortCode && $sortCode <= '306151')
                || ('306154' <= $sortCode && $sortCode <= '306155')
                || '306228' === $sortCode
                || '306229' === $sortCode
                || '306232' === $sortCode
                || '306242' === $sortCode
                || '306245' === $sortCode
                || '306249' === $sortCode
                || '306255' === $sortCode
                || ('306259' <= $sortCode && $sortCode <= '306263')
                || ('306272' <= $sortCode && $sortCode <= '306279')
                || '306281' === $sortCode
                || '306289' === $sortCode
                || '306296' === $sortCode
                || '306299' === $sortCode
                || '306300' === $sortCode
                || '306347' === $sortCode
                || ('306354' <= $sortCode && $sortCode <= '306355')
                || '306357' === $sortCode
                || '306359' === $sortCode
                || '306364' === $sortCode
                || '306394' === $sortCode
                || '306397' === $sortCode
                || '306410' === $sortCode
                || '306412' === $sortCode
                || ('306414' <= $sortCode && $sortCode <= '306415')
                || ('306418' <= $sortCode && $sortCode <= '306419')
                || '306422' === $sortCode
                || '306434' === $sortCode
                || ('306437' <= $sortCode && $sortCode <= '306438')
                || ('306442' <= $sortCode && $sortCode <= '306444')
                || '306457' === $sortCode
                || '306472' === $sortCode
                || '306479' === $sortCode
                || '306497' === $sortCode
                || ('306521' <= $sortCode && $sortCode <= '306522')
                || ('306537' <= $sortCode && $sortCode <= '306539')
                || '306541' === $sortCode
                || '306549' === $sortCode
                || ('306562' <= $sortCode && $sortCode <= '306565')
                || '306572' === $sortCode
                || ('306585' <= $sortCode && $sortCode <= '306586')
                || ('306592' <= $sortCode && $sortCode <= '306593')
                || ('306675' <= $sortCode && $sortCode <= '306677')
                || '306689' === $sortCode
                || ('306695' <= $sortCode && $sortCode <= '306696')
                || ('306733' <= $sortCode && $sortCode <= '306735')
                || ('306747' <= $sortCode && $sortCode <= '306749')
                || '306753' === $sortCode
                || '306756' === $sortCode
                || '306759' === $sortCode
                || '306762' === $sortCode
                || '306764' === $sortCode
                || ('306766' <= $sortCode && $sortCode <= '306767')
                || '306769' === $sortCode
                || '306772' === $sortCode
                || ('306775' <= $sortCode && $sortCode <= '306776')
                || '306779' === $sortCode
                || '306782' === $sortCode
                || ('306788' <= $sortCode && $sortCode <= '306789')
                || '306799' === $sortCode
                || '307184' === $sortCode
                || ('307188' <= $sortCode && $sortCode <= '307190')
                || '307198' === $sortCode
                || '307271' === $sortCode
                || '307274' === $sortCode
                || '307654' === $sortCode
                || '307779' === $sortCode
                || ('307788' <= $sortCode && $sortCode <= '307789')
                || '307809' === $sortCode
                || '308012' === $sortCode
                || '308016' === $sortCode
                || ('308026' <= $sortCode && $sortCode <= '308027')
                || ('308033' <= $sortCode && $sortCode <= '308034')
                || '308037' === $sortCode
                || '308042' === $sortCode
                || '308045' === $sortCode
                || ('308048' <= $sortCode && $sortCode <= '308049')
                || ('308054' <= $sortCode && $sortCode <= '308055')
                || '308063' === $sortCode
                || ('308076' <= $sortCode && $sortCode <= '308077')
                || ('308082' <= $sortCode && $sortCode <= '308083')
                || '308085' === $sortCode
                || ('308087' <= $sortCode && $sortCode <= '308089')
                || ('308095' <= $sortCode && $sortCode <= '308097')
                || '308404' === $sortCode
                || '308412' === $sortCode
                || ('308420' <= $sortCode && $sortCode <= '308427')
                || ('308433' <= $sortCode && $sortCode <= '308434')
                || ('308441' <= $sortCode && $sortCode <= '308446')
                || '308448' === $sortCode
                || ('308451' <= $sortCode && $sortCode <= '308454')
                || ('308457' <= $sortCode && $sortCode <= '308459')
                || ('308462' <= $sortCode && $sortCode <= '308463')
                || ('308467' <= $sortCode && $sortCode <= '308469')
                || ('308472' <= $sortCode && $sortCode <= '308473')
                || ('308475' <= $sortCode && $sortCode <= '308477')
                || '308479' === $sortCode
                || '308482' === $sortCode
                || ('308484' <= $sortCode && $sortCode <= '308487')
                || '308784' === $sortCode
                || '308804' === $sortCode
                || '308822' === $sortCode
                || '308952' === $sortCode
                || ('309001' <= $sortCode && $sortCode <= '309633')
                || ('309635' <= $sortCode && $sortCode <= '309746')
                || ('309748' <= $sortCode && $sortCode <= '309871')
                || ('309873' <= $sortCode && $sortCode <= '309915')
                || ('309917' <= $sortCode && $sortCode <= '309999')
            )
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 1, 7, 6, 5, 4, 3, 2, 1], 9];
        }

        if (
            1 === $pass
            && (
                   ('300050' <= $sortCode && $sortCode <= '300051')
                || '301022' === $sortCode
                || '301027' === $sortCode
                || '301137' === $sortCode
                || '301142' === $sortCode
                || ('301154' <= $sortCode && $sortCode <= '301155')
                || '301166' === $sortCode
                || '301170' === $sortCode
                || '301433' === $sortCode
                || '301435' === $sortCode
                || '301439' === $sortCode
                || '301443' === $sortCode
                || '301458' === $sortCode
                || '301463' === $sortCode
                || '301466' === $sortCode
                || '301474' === $sortCode
                || '301482' === $sortCode
                || '301485' === $sortCode
                || '301487' === $sortCode
                || '301510' === $sortCode
                || '301514' === $sortCode
                || '301517' === $sortCode
                || '301525' === $sortCode
                || '301573' === $sortCode
                || '301607' === $sortCode
                || '301657' === $sortCode
                || '301705' === $sortCode
                || ('900000' <= $sortCode && $sortCode <= '902396')
                || ('902398' <= $sortCode && $sortCode <= '909999')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 128, 64, 32, 16, 8, 4, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '300161' === $sortCode
                || '300176' === $sortCode
                || ('304065' <= $sortCode && $sortCode <= '304067')
            )
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 5, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '303996' === $sortCode
                || '309634' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 3, 2, 9, 8, 1, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '400515' === $sortCode
                || '401055' === $sortCode
                || '401199' === $sortCode
                || '401266' === $sortCode
                || ('401276' <= $sortCode && $sortCode <= '401279')
                || '401900' === $sortCode
                || '401950' === $sortCode
                || ('404375' <= $sortCode && $sortCode <= '404384')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 8, 5, 7, 3, 4, 9, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '406420' === $sortCode
                || '608316' === $sortCode
            )
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 0, 8, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '608371' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 2, 8, 4, 3, 7, 5, 6, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '608384' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 1, 2, 9, 8, 7, 6, 5, 4, 3, 2, 1, 1], 0];
        }

        if (
            1 === $pass
            && (
                   '609599' === $sortCode
                || '839147' === $sortCode
            )
        ) {
            return ['MOD10', [0, 0, 0, 0, 0, 0, 0, 5, 7, 5, 2, 1, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('728990' <= $sortCode && $sortCode <= '728999')
            )
        ) {
            return ['MOD10', [3, 1, 7, 3, 1, 7, 3, 1, 7, 3, 1, 7, 3, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('770100' <= $sortCode && $sortCode <= '771799')
                || '771877' === $sortCode
                || ('771900' <= $sortCode && $sortCode <= '772799')
                || ('772813' <= $sortCode && $sortCode <= '772817')
                || ('772901' <= $sortCode && $sortCode <= '773999')
                || ('774100' <= $sortCode && $sortCode <= '774599')
                || ('774700' <= $sortCode && $sortCode <= '774830')
                || ('774832' <= $sortCode && $sortCode <= '777789')
                || ('777791' <= $sortCode && $sortCode <= '777999')
                || '778001' === $sortCode
                || ('778300' <= $sortCode && $sortCode <= '778799')
                || '778855' === $sortCode
                || ('778900' <= $sortCode && $sortCode <= '779174')
                || ('779414' <= $sortCode && $sortCode <= '779999')
            )
        ) {
            return ['MOD11', [0, 0, 1, 2, 5, 3, 6, 4, 8, 7, 10, 9, 3, 1], 7];
        }

        if (
            1 === $pass
            && (
                   ('820000' <= $sortCode && $sortCode <= '826097')
                || ('826099' <= $sortCode && $sortCode <= '826917')
                || ('826919' <= $sortCode && $sortCode <= '827999')
                || ('829000' <= $sortCode && $sortCode <= '829999')
            )
        ) {
            return ['MOD11', [0, 0, 0, 0, 0, 0, 0, 0, 7, 3, 4, 9, 2, 1], 0];
        }

        if (
            2 === $pass
            && (
                   ('820000' <= $sortCode && $sortCode <= '826097')
                || ('826099' <= $sortCode && $sortCode <= '826917')
                || ('826919' <= $sortCode && $sortCode <= '827999')
                || ('829000' <= $sortCode && $sortCode <= '829999')
            )
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1], 3];
        }

        if (
            1 === $pass
            && (
                   ('830000' <= $sortCode && $sortCode <= '835700')
                || ('836500' <= $sortCode && $sortCode <= '836501')
                || ('836505' <= $sortCode && $sortCode <= '836506')
                || '836510' === $sortCode
                || '836515' === $sortCode
                || '836530' === $sortCode
                || '836535' === $sortCode
                || '836540' === $sortCode
                || '836560' === $sortCode
                || '836565' === $sortCode
                || '836570' === $sortCode
                || '836585' === $sortCode
                || '836590' === $sortCode
                || '836595' === $sortCode
                || '836620' === $sortCode
                || '836625' === $sortCode
                || '836630' === $sortCode
                || '837550' === $sortCode
                || '837560' === $sortCode
                || '837570' === $sortCode
                || '837580' === $sortCode
            )
        ) {
            return ['MOD11', [0, 0, 4, 3, 2, 7, 2, 7, 6, 5, 4, 3, 2, 1], 0];
        }

        if (
            1 === $pass
            && (
                   ('870000' <= $sortCode && $sortCode <= '872791')
                || ('872793' <= $sortCode && $sortCode <= '876899')
                || '876919' === $sortCode
                || ('876921' <= $sortCode && $sortCode <= '876923')
                || ('876925' <= $sortCode && $sortCode <= '876932')
                || '876935' === $sortCode
                || '876951' === $sortCode
                || ('876953' <= $sortCode && $sortCode <= '876955')
                || '876957' === $sortCode
                || ('876961' <= $sortCode && $sortCode <= '876965')
                || ('877000' <= $sortCode && $sortCode <= '877070')
                || '877071' === $sortCode
                || '877078' === $sortCode
                || '877088' === $sortCode
                || '877090' === $sortCode
                || '877098' === $sortCode
                || ('877099' <= $sortCode && $sortCode <= '879999')
            )
        ) {
            return ['MOD11', [0, 0, 1, 2, 5, 3, 6, 4, 8, 7, 10, 9, 3, 1], 10];
        }

        if (
            2 === $pass
            && (
                   ('870000' <= $sortCode && $sortCode <= '872791')
                || ('872793' <= $sortCode && $sortCode <= '876899')
                || '876919' === $sortCode
                || ('876921' <= $sortCode && $sortCode <= '876923')
                || ('876925' <= $sortCode && $sortCode <= '876932')
                || '876935' === $sortCode
                || '876951' === $sortCode
                || ('876953' <= $sortCode && $sortCode <= '876955')
                || '876957' === $sortCode
                || ('876961' <= $sortCode && $sortCode <= '876965')
                || ('877000' <= $sortCode && $sortCode <= '877070')
                || '877071' === $sortCode
                || '877078' === $sortCode
                || '877088' === $sortCode
                || '877090' === $sortCode
                || '877098' === $sortCode
                || ('877099' <= $sortCode && $sortCode <= '879999')
            )
        ) {
            return ['MOD11', [0, 0, 5, 10, 9, 8, 0, 7, 6, 5, 4, 3, 2, 1], 11];
        }

        if (
            2 === $pass
            && (
                   ('900000' <= $sortCode && $sortCode <= '902396')
                || ('902398' <= $sortCode && $sortCode <= '909999')
            )
        ) {
            return ['MOD11', [32, 16, 8, 4, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0], 0];
        }

        if (
            1 === $pass
            && (
                   ('938000' <= $sortCode && $sortCode <= '938696')
                || ('938698' <= $sortCode && $sortCode <= '938999')
            )
        ) {
            return ['MOD11', [7, 6, 5, 4, 3, 2, 7, 6, 5, 4, 3, 2, 0, 0], 5];
        }

        if (
            2 === $pass
            && (
                   ('938000' <= $sortCode && $sortCode <= '938696')
                || ('938698' <= $sortCode && $sortCode <= '938999')
            )
        ) {
            return ['DBLAL', [2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 0], 5];
        }
    }
}
