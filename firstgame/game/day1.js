//kaboom(
//    {   width: 360, 
//        height: 740, 
//        canvas: document.getElementById("game_canvas"),
//        background: [ 0, 0, 255, ],
//    });

const map = [
    '                           ',
    '                           ',
    '                           ',
    '                           ',
    '          $                ',
    '    %   =^=%=              ',
    '                           ',
    '                       -+  ',
    '        $    ^   ^  ()     ',
    '======================   ==',
]

const levelCfg = {
    width: 20,
    height: 20,
    '=' :  [sprite('2')],
    '$' :  [sprite('Mushroom_2')],
    '%' :  [sprite('Mushroom_1'), 'mushroom_1-surprise'],
    '(' :  [sprite('1')],
    ')' :  [sprite('3')],
    '-' :  [sprite('13')],
    '+' :  [sprite('15')],
}

addLevel(map, levelCfg)