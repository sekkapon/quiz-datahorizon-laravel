<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function solve()
    {
        return view('solve');
    }


    public function getData()
    {
        /* 
           HIER 
         + GIBT 
         +   ES 
         ------
          NEUES 
        */

        /* R + T = 10 */
        /* 12 < H+G < 17 , != 0  */
        /* E < 7 , !=0  */
        /* U = 3,5,7,9 */

        $i = 1;
        while (1) { /* loop for find integer  */

            $this->arrForCheckChar = [ /* new data for check every loop */

                'N' => 1    /*  N = 1 because no leading zeros and max value H + G = 1X can't = 2X  */

            ];

            $arrData = [
                'H', 'E', 'U',  'S',  'R',  'T', 'B', 'S', 'I' /* set variable */
            ];

            foreach ($arrData as $key => $value) { /* loop for find value of variable */

                switch ($value) { /* case check variable */

                    case 'H':
                        /* H != 0 && ! = 1 && != 2 */
                        $arrNumberToRandom = [3, 4, 5, 6, 7, 8, 9];
                        /* H should be 3 to 9 beacuse 
                         1. no leading zeros
                         2. 1 has been used
                         3. if H = 2 then G = 9 so H + G = 11(NE) then E != 1
                        */

                        $this->toRandom('H', $arrNumberToRandom); /* call function for check H */

                        /* find G */
                        switch ($this->arrForCheckChar['H']) { /* case check G from H */
                                /* H + G = NE so NE > 11 becasue valuse of N is 1 so E != 1
                                   H + G shold be 12 to 17
                                */

                                /* ----conditiob find value of G---  */
                            case 3:
                                $arrNumberToRandom = [9];

                                $this->toRandom('G', $arrNumberToRandom);
                                break;
                            case 4:
                                $arrNumberToRandom = [8, 9];
                                $this->toRandom('G', $arrNumberToRandom);
                                break;
                            case 5 || 6:
                                $arrNumberToRandom = [7, 8, 9];
                                $this->toRandom('G', $arrNumberToRandom);
                                break;
                            case 7:
                                $arrNumberToRandom = [5, 6, 8, 9];
                                $this->toRandom('G', $arrNumberToRandom);
                                break;
                            case 8:
                                $arrNumberToRandom = [4, 5, 6, 9];
                                $this->toRandom('G', $arrNumberToRandom);
                                break;
                            case 9:
                                $arrNumberToRandom = [3, 4, 5, 6, 8];
                                $this->toRandom('G', $arrNumberToRandom);
                                break;
                                /* -------------------------------------- */
                        }
                        break;

                    case 'I':
                        $arrNumberToRandom = [0, 2, 3, 4, 5, 6, 7, 8, 9];
                        $this->toRandom('I', $arrNumberToRandom);
                        break;

                    case 'E':
                        /* H + G = NE 
                           H + G = 10 + E
                           E = (H + G) - 10 
                        */
                        $num = (int)$this->arrForCheckChar['H'] + (int)$this->arrForCheckChar['G'];
                        $E = $num - 10;
                        $this->arrForCheckChar['E'] = $E;
                        break;

                    case 'R':
                        /* R + T = 10 beacuse S + 10(R+T) = S
                           R != 9,1 because 1 has been used and R = 9  will make T = 1 
                           R != 5 because R = 5 will make T = 5
                        */
                        $arrNumberToRandom = [2, 3, 4, 6, 7, 8];
                        $this->toRandom('R', $arrNumberToRandom);
                        break;

                    case 'B':
                        /* random to find B  */
                        $arrNumberToRandom = [0, 2, 3, 4, 5, 6, 7, 8, 9];
                        $this->toRandom('B', $arrNumberToRandom);
                        break;

                    case 'T':
                        /* T = R - 10 */
                        $T = 10 - (int)$this->arrForCheckChar['R'];
                        if (in_array($T, $this->arrForCheckChar)) { /* if value of T has been used */

                            /* find new R */
                            $arrNumberToRandom = [2, 3, 4, 6, 7, 8];
                            $this->toRandom('R', $arrNumberToRandom);

                            $T = 10 - (int)$this->arrForCheckChar['R']; /* find new T */
                            $this->arrForCheckChar['T'] = $T; /* set integer in array */
                        } else {
                            $this->arrForCheckChar['T'] = $T;
                        }
                        break;

                    case 'S':
                        /* random to find B  */
                        $arrNumberToRandom = [0, 2, 3, 4, 5, 6, 7, 8, 9];
                        $this->toRandom('S', $arrNumberToRandom);
                        break;

                    case 'U':
                        /* 2I + B + 1(carry num) = U
                           carry number from R+T+S becausel R+T+S > 10
                           2I is even number but even number +1 will make U is odd number 
                        */
                        $arrNumberToRandom = [3, 5, 7, 9]; //  2I + 1 (is carry num) = U  (is odd num)
                        $this->toRandom('U', $arrNumberToRandom);
                        break;

                    default:
                        break;
                }
            }

            /* HIER + GIBT + ES = NEUES */
            $HIER =  $this->arrForCheckChar['H'] . $this->arrForCheckChar['I'] . $this->arrForCheckChar['E'] . $this->arrForCheckChar['R'];
            $GIBT = $this->arrForCheckChar['G'] . $this->arrForCheckChar['I'] . $this->arrForCheckChar['B'] . $this->arrForCheckChar['T'];
            $ES = $this->arrForCheckChar['E'] . $this->arrForCheckChar['S'];
            $NEUES = $this->arrForCheckChar['N'] . $this->arrForCheckChar['E']  . $this->arrForCheckChar['U'] . $this->arrForCheckChar['E'] . $this->arrForCheckChar['S'];

            if ((int)$HIER + (int)$GIBT + (int)$ES == (int)$NEUES) { /* if true then return value and count loop */
                return json_encode(array('code' => 1, 'data' => [$HIER, $GIBT, $ES, $NEUES], 'countLoop' => $i));
            }
            $i++;
        }
    }


    public function toRandom($charToRandom, $arrToRandom)
    {
        /* loop */
        for ($i = 1; $i = count($arrToRandom); $i++) {

            $num = $arrToRandom[array_rand($arrToRandom)]; /* random integer in arrayToRandom */

            if (!in_array($num, $this->arrForCheckChar)) {  /* check data has been used in array arrForCheckChar */

                $this->arrForCheckChar[$charToRandom] = $num; /* set integer in arrForCheckChar for check next loop */

                return $num; /* return data integer */
            } else {
                unset($arrToRandom[array_search($num, $arrToRandom)]); /* remove integer in random for reduce in next loop */
            }
        }
    }
}
