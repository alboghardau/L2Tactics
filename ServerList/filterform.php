<center><a href="setfilter.php?action=del"><img src="images/rem.png" alt="remove"/></a></center>

<table>

<?php

    
        if(isset($_SESSION['filters'][0]))
    {
        echo "<tr><td>Min Rate:</td><td>".$_SESSION['filters'][0].'</td><td><a href="setfilter.php?action=rem&f=0"><img src="images/close.png"/></a></td></tr>';
    }
    
        if(isset($_SESSION['filters'][1]))
    {
        echo "<tr><td>Max Rate:</td><td>".$_SESSION['filters'][1].'</td><td><a href="setfilter.php?action=rem&f=1"><img src="images/close.png"/></a></td></tr>';
    }
           
        if(isset($_SESSION['filters'][2]))
    {
        echo '<tr><td>Anti-Bot:</td><td><img src="images/'.$_SESSION['filters'][2].'.png" alt="img"/></td><td><a href="setfilter.php?action=rem&f=2"><img src="images/close.png"/></a></td></tr>';
    }
    
            if(isset($_SESSION['filters'][3]))
    {
        echo '<tr><td>Donation:</td><td><img src="images/'.$_SESSION['filters'][3].'.png" alt="img"/></td><td><a href="setfilter.php?action=rem&f=3"><img src="images/close.png"/></a></td></tr>';
    }
    
        if(isset($_SESSION['filters'][4]))
    {
        echo "<tr><td>Chronicle:</td><td>".$_SESSION['filters'][4].'</td><td><a href="setfilter.php?action=rem&f=4"><img src="images/close.png"/></a></td></tr>';
    }

?>
</table><br/>

<form action="setfilter.php?action=add" method="post">
<center><table>
      
    <tr>
    <td class="fil1">Min Rate:</td>
    <td class="fil2"><input type="text" name="minrate" style="width:32px" /></td>
    <td class="fil3"><input type="image" name="submit" src="images/add.png" width="24px" height="24px"/></td>
    </tr>
    
    <tr>    
    <td class="fil1"> Max Rate:</td>
    <td class="fil2"><input type="text" name="maxrate" style="width:32px" /></td>
    <td class="fil3"><input type="image" name="submit" src="images/add.png" width="24px" height="24px"/></td>
    </tr>
      
</table></center>
</form>


    
    <center><table>
        <tr>
            <td class="fil1">Anti-Bot:</td>
            <td class="fil2">
                <form action="setfilter.php?action=add" method="post">
                    <input type="hidden" name="antibot" value="Yes"/>
                    <input type="image" name="submit" src="images/Yes.png" width="24px" height="24px"/>
                </form>
            </td>
            <td class="fil3">
                <form action="setfilter.php?action=add" method="post">
                    <input type="hidden" name="antibot" value="No"/>
                    <input type="image" name="submit" src="images/No.png" width="24px" height="24px"/>
                </form>                
            </td>
        </tr>
    </table></center>
    
    <center><table>
        <tr>
            <td class="fil1">Donations:</td>
            <td class="fil2">
                <form action="setfilter.php?action=add" method="post">
                    <input type="hidden" name="donation" value="Yes"/>
                    <input type="image" name="submit" src="images/Yes.png" width="24px" height="24px"/>
                </form>
            </td>
            <td class="fil3">
                <form action="setfilter.php?action=add" method="post">
                    <input type="hidden" name="donation" value="No"/>
                    <input type="image" name="submit" src="images/No.png" width="24px" height="24px"/>
                </form>                
            </td>
        </tr>
    </table></center>
    
 <center><table>
        <tr>
            <td class="fil1">Chronicle:</td>
            <td class="fil2">
                <form action="setfilter.php?action=add" method="post">

                      C1<input type="radio" name="chronicle" value="C1"/>
            C2<input type="radio" name="chronicle" value="C2"/>
            C3<input type="radio" name="chronicle" value="C3"/>
            C4<input type="radio" name="chronicle" value="C4"/>
            C5<input type="radio" name="chronicle" value="C5"/>
            Int<input type="radio" name="chronicle" value="Int"/>
            Kl<input type="radio" name="chronicle" value="Kml"/>
            Hb<input type="radio" name="chronicle" value="Hb"/>
             G1<input type="radio" name="chronicle" value="G1"/>
            G2<input type="radio" name="chronicle" value="G2"/>
            GF<input type="radio" name="chronicle" value="Gf"/>
            GE<input type="radio" name="chronicle" value="Ge"/>
            Fry<input type="radio" name="chronicle" value="Fry"/>
            H5<input type="radio" name="chronicle" value="H5" />

            </td>
            <td class="fil3">
                <input type="image" name="submit" src="images/add.png" width="24px" height="24px"/>
                </form>                
            </td>
        </tr>
    </table></center>