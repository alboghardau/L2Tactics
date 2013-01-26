<?php
$srvid = $_GET['srvid'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$result = mysql_query("SELECT * FROM servers WHERE id=".$srvid);

$row = mysql_fetch_array($result);

?>
<form action="srvedit.php" method="post">
<center><table>
    <tr>
        <td>Name:</td><td><input type="text" name="name" value="<?php echo $row['name'];?>"/></td>
    </tr>
    <tr>
        <td>Site:</td><td><input type="text" name="site" value="<?php echo $row['site'];?>"/></td>
    </tr>
        <tr>
        <td>Banner link:(optional)</td><td><input type="text" name="ad_link" value="<?php echo $row['ad_link'];?>"/></td>
    </tr>
    <tr>
        <td>Game Server(ip/link)</td><td><input type="text" name="host" value="<?php echo $row['host'];?>"/></td>
    </tr>
    <tr>
        <td>Game Server Port</td><td><input type="text" name="port" value="<?php echo $row['port'];?>"/></td>
    </tr>
    <tr>
        <td>Country:</td>
    <td>
        <select name="country">
    

<option value="AL">Albania</option>
<option value="AD">Andorra</option>
<option value="AR">Argentina</option>
<option value="AA">Armenia</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaijan</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BO">Bolivia</option>
<option value="BA">Bosnia &amp; Herzegovina</option>
<option value="BR">Brazil</option>
<option value="BG">Bulgaria</option>
<option value="CA">Canada</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CO">Colombia</option>
<option value="CR">Costa Rica</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK">Denmark</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="EE">Estonia</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GB">Great Britain</option>
<option value="GR">Greece</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Ireland</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JP">Japan</option>
<option value="KZ">Kazakhstan</option>
<option value="KS">Korea South</option>
<option value="LV">Latvia</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MK">Macedonia</option>
<option value="MY">Malaysia</option>
<option value="MT">Malta</option>
<option value="MX">Mexico</option>
<option value="MD">Moldova</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="MA">Morocco</option>
<option value="NL">Netherlands</option>
<option value="NZ">New Zealand</option>
<option value="NO">Norway</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="ME">Republic of Montenegro</option>
<option value="RS">Republic of Serbia</option>
<option value="RO">Romania</option>
<option value="RU">Russia</option>
<option value="SA">Saudi Arabia</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="ZA">South Africa</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="TW">Taiwan</option>
<option value="TH">Thailand</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="UA">Ukraine</option>
<option value="US">United States of America</option>
<option value="UY">Uruguay</option>
<option value="VE">Venezuela</option>
        
    </select>
    </td>
    </tr>
    
    
                 <tr>
        <td>Chronicle</td><td>
            C1<input type="radio" name="chronicle" value="C1" <?php if($row['chronicle']=='C1') echo 'checked="checked"';?>/>
            C2<input type="radio" name="chronicle" value="C2" <?php if($row['chronicle']=='C2') echo 'checked="checked"';?>/>
            C3<input type="radio" name="chronicle" value="C3" <?php if($row['chronicle']=='C3') echo 'checked="checked"';?>/>
            C4<input type="radio" name="chronicle" value="C4" <?php if($row['chronicle']=='C4') echo 'checked="checked"';?>/>
            C5<input type="radio" name="chronicle" value="C5" <?php if($row['chronicle']=='C5') echo 'checked="checked"';?>/>
            Interlude<input type="radio" name="chronicle" value="Int" <?php if($row['chronicle']=='Int') echo 'checked="checked"';?>/>
            Kamael<input type="radio" name="chronicle" value="Kml" <?php if($row['chronicle']=='Kml') echo 'checked="checked"';?>/>
            Hellbound<input type="radio" name="chronicle" value="Hb" <?php if($row['chronicle']=='Hb') echo 'checked="checked"';?>/>
    
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            Gracia:P1<input type="radio" name="chronicle" value="G1" <?php if($row['chronicle']=='G1') echo 'checked="checked"';?>/>
            Gracia:P2<input type="radio" name="chronicle" value="G2" <?php if($row['chronicle']=='G2') echo 'checked="checked"';?>/>
            Gracia:Final<input type="radio" name="chronicle" value="Gf" <?php if($row['chronicle']=='G3') echo 'checked="checked"';?>/>
            Gracia:Ep<input type="radio" name="chronicle" value="Ge" <?php if($row['chronicle']=='Ge') echo 'checked="checked"';?>/>
            Freya<input type="radio" name="chronicle" value="Fry" <?php if($row['chronicle']=='Fry') echo 'checked="checked"';?>/>
            HighFive<input type="radio" name="chronicle" value="H5" <?php if($row['chronicle']=='H5') echo 'checked="checked"';?>/>
        </td>
        
    </tr>
    
    
    
    
    
    
    
    <tr>
        <td>XP Rate:</td><td><input type="text" name="rate_xp" value="<?php echo $row['rate_xp'];?>"/></td>
    </tr>
       <tr>
        <td>SP Rate:</td><td><input type="text" name="rate_sp" value="<?php echo $row['rate_sp'];?>"/></td>
    </tr>
       <tr>
        <td>Drop Rate:</td><td><input type="text" name="rate_drop" value="<?php echo $row['rate_drop'];?>"/></td>
    </tr>
       <tr>
        <td>Adena Rate:</td><td><input type="text" name="rate_adena" value="<?php echo $row['rate_adena'];?>"/></td>
    </tr>
          <tr>
        <td>Enchant Rate(Without %):</td><td><input type="text" name="ench_rate" value="<?php echo $row['ench_rate'];?>"/></td>
    </tr>
              <tr>
        <td>Enchant Safe:</td><td><input type="text" name="ench_safe" value="<?php echo $row['ench_safe'];?>"/></td>
    </tr>
              <tr>
        <td>Max. Enchant:</td><td><input type="text" name="ench_max" value="<?php echo $row['ench_max'];?>"/></td>
    </tr>
    
    
    
     <tr>
        <td>Donations:</td>
        <td>Yes<input type="radio" name="donation" value="Yes" <?php if($row['donation']=='Yes') echo 'checked="checked"';?>/>
        No<input type="radio" name="donation" value="No" <?php if($row['donation']=='No') echo 'checked="checked"';?>/></td>
    </tr>
         <tr>
        <td>Anti-Bot:</td><td>Yes<input type="radio" name="anti_bot" value="Yes" <?php if($row['anti_bot']=='Yes') echo 'checked="checked"';?>/>
            No<input type="radio" name="anti_bot" value="No" <?php if($row['anti_bot']=='No') echo 'checked="checked"';?>/></td>
    </tr>
    
    
    <tr>
        <td>Buffer:</td><td>Yes<input type="radio" name="buffer" value="Yes" <?php if($row['buffer']=='Yes') echo 'checked="checked"';?>/>
            No<input type="radio" name="buffer" value="No" <?php if($row['buffer']=='No') echo 'checked="checked"';?>/></td>
    </tr>
        <tr>
        <td>GmShop:</td><td>Yes<input type="radio" name="gmshop" value="Yes" <?php if($row['gmshop']=='Yes') echo 'checked="checked"';?>/>
            No<input type="radio" name="gmshop" value="No"  <?php if($row['gmshop']=='No') echo 'checked="checked"';?>/></td>
    </tr>
         <tr>
        <td>GmShop Grade:</td><td>
            B<input type="radio" name="gm_grade" value="B" <?php if($row['gm_grade']=='B') echo 'checked="checked"';?>/>
            A<input type="radio" name="gm_grade" value="A" <?php if($row['gm_grade']=='A') echo 'checked="checked"';?>/>
            S<input type="radio" name="gm_grade" value="S" <?php if($row['gm_grade']=='S') echo 'checked="checked"';?>/>
            S80<input type="radio" name="gm_grade" value="S80" <?php if($row['gm_grade']=='S80') echo 'checked="checked"';?>/>
            S84<input type="radio" name="gm_grade" value="S84" <?php if($row['gm_grade']=='S84') echo 'checked="checked"';?>/>
            No<input type="radio" name="gm_grade" value="No"  <?php if($row['gm_grade']=='No') echo 'checked="checked"';?>/></td>
    </tr>


    <tr><td>Description(Don't use ")</td>
        <td>
<textarea name="description" rows="15" cols="50" wrap="soft">
<?php  echo $row['description'];?>
</textarea>
        </td>
</tr>


</table>
    <input type="submit" name="submit" value="Update"/>
</center>
</form>
<br/>

<?php
mysql_close($connection);
?>