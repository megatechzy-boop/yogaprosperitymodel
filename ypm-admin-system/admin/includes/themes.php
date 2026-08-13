<?php
/**
 * Landing page design themes.
 * Each theme is just a set of CSS variables — layout/structure stays
 * the same, only the color language changes. Add more here anytime.
 */
function ypm_themes() {
    return [
        'classic' => [
            'label' => 'Moss Classic (site default)',
            'vars' => ['paper'=>'#F7F1E8','white'=>'#FFFDF8','ink'=>'#17251F','ink-soft'=>'#59675F','primary'=>'#214D3C','primary-deep'=>'#102A21','accent'=>'#D99A54','accent-soft'=>'#F0C98C','cta'=>'#A8472F'],
        ],
        'sunrise' => [
            'label' => 'Sunrise Terracotta',
            'vars' => ['paper'=>'#FFF3E8','white'=>'#FFFDF9','ink'=>'#2B1B12','ink-soft'=>'#7A5C48','primary'=>'#C1591F','primary-deep'=>'#7A3811','accent'=>'#F2A65A','accent-soft'=>'#FBD9A8','cta'=>'#B4322E'],
        ],
        'ocean' => [
            'label' => 'Ocean Calm',
            'vars' => ['paper'=>'#EDF5F5','white'=>'#FBFEFE','ink'=>'#0F2A2E','ink-soft'=>'#4B6A6E','primary'=>'#0E6E76','primary-deep'=>'#083F44','accent'=>'#59C7C1','accent-soft'=>'#B7E7E3','cta'=>'#D97B3C'],
        ],
        'royal' => [
            'label' => 'Royal Plum',
            'vars' => ['paper'=>'#F4EEF6','white'=>'#FDFBFE','ink'=>'#241A2E','ink-soft'=>'#6B5C77','primary'=>'#5B2A72','primary-deep'=>'#331843','accent'=>'#C79EDB','accent-soft'=>'#E6D3EF','cta'=>'#D4A72C'],
        ],
        'midnight' => [
            'label' => 'Midnight Gold',
            'vars' => ['paper'=>'#12161C','white'=>'#1B212A','ink'=>'#F2EFE7','ink-soft'=>'#AEB4BD','primary'=>'#D9B25C','primary-deep'=>'#A9852F','accent'=>'#D9B25C','accent-soft'=>'#F0DFB1','cta'=>'#C1592F'],
        ],
        'blush' => [
            'label' => 'Blush Rose',
            'vars' => ['paper'=>'#FBEFEF','white'=>'#FFFAFA','ink'=>'#2E1F22','ink-soft'=>'#7A6165','primary'=>'#B85C6B','primary-deep'=>'#7A3542','accent'=>'#E7A9B4','accent-soft'=>'#F5D3D9','cta'=>'#4E5D4E'],
        ],
        'forest' => [
            'label' => 'Forest Emerald',
            'vars' => ['paper'=>'#EEF3EC','white'=>'#F9FBF8','ink'=>'#15271A','ink-soft'=>'#4C6152','primary'=>'#1B5A38','primary-deep'=>'#0E351F','accent'=>'#7FB88E','accent-soft'=>'#C9E4CF','cta'=>'#D97C34'],
        ],
        'desert' => [
            'label' => 'Desert Sand',
            'vars' => ['paper'=>'#F5EEDF','white'=>'#FCF8EE','ink'=>'#332A1E','ink-soft'=>'#7C6E56','primary'=>'#9C6B33','primary-deep'=>'#5F3F1B','accent'=>'#D2A05C','accent-soft'=>'#EAD2A6','cta'=>'#A8472F'],
        ],
        'monochrome' => [
            'label' => 'Monochrome Ink',
            'vars' => ['paper'=>'#F4F4F2','white'=>'#FFFFFF','ink'=>'#161616','ink-soft'=>'#5C5C5C','primary'=>'#1F1F1F','primary-deep'=>'#000000','accent'=>'#9C9C9C','accent-soft'=>'#DADADA','cta'=>'#C1592F'],
        ],
        'lotus' => [
            'label' => 'Lotus Pink',
            'vars' => ['paper'=>'#FBF0F3','white'=>'#FFFAFB','ink'=>'#2B1F26','ink-soft'=>'#7A6570','primary'=>'#7A3B57','primary-deep'=>'#4A1F33','accent'=>'#F3B8CC','accent-soft'=>'#FBE0EA','cta'=>'#3E7A5C'],
        ],
    ];
}

function ypm_theme_css($vars) {
    $out = '';
    foreach ($vars as $k => $v) {
        $out .= "--$k:$v;";
    }
    return $out;
}
