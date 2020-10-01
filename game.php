<!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="description" content="">
  <meta name="author" content="">

	<title>game</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>เกมเรียงเลข</title>
<style>
.cell {
  width:40px;
  height:40px;
  font-family:Ms Sans Serif;
  font-size:12pt;
  font-weight:bold;
  background-color:#ffff99;
  color:#ff0033;
  border-top:1px solid #000000;
  border-left:1px solid #000000;
  border-right:1px solid #000000;
  border-bottom:1px solid #000000;
  text-align:center;
</style>
</head>

<body onLoad="loadBoard(4)" topmargin="0" leftmargin="0">
	<br>

<div align="center">
  <table border="2" width="778" height="209" bordercolor="#0000FF" cellspacing="0" cellpadding="0">
    <tr>
      <td background="../../../bg/wood.jpg" width="780" height="27">
        <p align="center"><b>
        <font face="MS Sans Serif" size="5" color="#FF0000"><span lang="th"id="about">
        เกมเรียงเลข 1 - 10 ใน</span>BOARD</font></b></td>
    </tr>
    <tr>
      <td width="780" height="178" valign="top"><br><br>
      <script>
var gsize, ghrow, ghcol, gtime, gmoves, gintervalid=-1, gshuffling;
function toggleHelp()
{
  if (butHelp.value == "ซ่อนวิธีการเล่น")
  {
    help.style.display = "none";
    butHelp.value = "แสดงวิธีการเล่น";
  }
  else
  {
    help.style.display = "";
    butHelp.value = "ซ่อนวิธีการเล่น";
  }  
}
//random number between low and hi
function r(low,hi)
{
  return Math.floor((hi-low)*Math.random()+low); 
}
//random number between 1 and hi
function r1(hi)
{
  return Math.floor((hi-1)*Math.random()+1); 
}
//random number between 0 and hi
function r0(hi)
{
  return Math.floor((hi)*Math.random()); 
}
function startGame()
{
  shuffle();
  gtime = 0;
  gmoves = 0;
  tickTime();
  gintervalid = setInterval("tickTime()",1000);
}
function stopGame()
{
  if (gintervalid==-1) return;
  clearInterval(gintervalid);
  fldStatus.innerHTML = "";
  gintervalid=-1;
}
function tickTime()
{
  showStatus();
  gtime++;
}
function checkWin()
{
  var i, j, s;
  if (gintervalid==-1) return; //game not started!
  if (!isHole(gsize-1,gsize-1)) return;
  for (i=0;i<gsize;i++)
    for (j=0;j<gsize;j++)
    {
      if (!(i==gsize-1 && j==gsize-1)) //ignore last block (ideally a hole)
      {
       if (getValue(i,j)!=(i*gsize+j+1).toString()) return;
      }
    }
  stopGame();
  s = "<table cellpadding=4>";
  s += "<tr><td align=center class=capt3>!!! คุณชนะ !!!</td></tr>";
  s += "<tr class=capt4><td align=center>คุณใช้เวลาในการเล่นทั้งสิ้น " + gtime + "  วินาที";
  s += " และ เลื่อนไปทั้งสิ้น " + gmoves + "  ครั้ง</td></tr>";
  s += "<tr><td align=center class=capt4>ความเร็วในการเล่นของคุณ คือ เคลื่อนที่ " + Math.round(1000*gmoves/gtime)/1000 + "  ครั้ง ต่อ วินาที</td></tr>";
  s += "</table>";
  fldStatus.innerHTML = s;
//  shuffle();
}
function showStatus()
{
  fldStatus.innerHTML = "เวลาที่เล่นไป " + gtime + " วินาที และ เลื่อนไปแล้วทั้งสิ้น " + gmoves + " ครั้ง"
}
function showTable()
{
  var i, j, s;
  stopGame();
  s = "<table border=0 cellpadding=0 cellspacing=0 bgcolor='#0099cc'><tr><td class=bigcell>";
  s = s + "<table border=0 cellpadding=0 cellspacing=0>";
  for (i=0; i<gsize; i++)
  {
    s = s + "<tr>";    
    for (j=0; j<gsize; j++)
    {
      s = s + "<td id=a_" + i + "_" + j + " onclick='move(this)' class=cell>" + (i*gsize+j+1) + "</td>";
    }
    s = s + "</tr>";        
  }
  s = s + "</table>";
  s = s + "</td></tr></table>";      
  return s;
}
function getCell(row, col)
{
 return eval("a_" + row + "_" + col);
}
function setValue(row,col,val)
{
  var v = getCell(row, col);
  v.innerHTML = val;
  v.className = "cell";
}
function getValue(row,col)
{
//  alert(row + "," + col);
 var v = getCell(row, col);
  return v.innerHTML;
}
function setHole(row,col)
{ 
  var v = getCell(row, col);
  v.innerHTML = "";
  v.className = "hole";
  ghrow = row;
  ghcol = col;
}
function getRow(obj)
{
  var a = obj.id.split("_");
  return a[1];
}
function getCol(obj)
{
  var a = obj.id.split("_");
  return a[2];
}
function isHole(row, col)
{
  return (row==ghrow && col==ghcol) ? true : false;
}
function getHoleInRow(row)
{
  var i;
  return (row==ghrow) ? ghcol : -1;
}
function getHoleInCol(col)
{
  var i;
  return (col==ghcol) ? ghrow : -1;
}
function shiftHoleRow(src,dest,row)
{
  var i;
  //conversion to integer needed in some cases!
  src = parseInt(src);
  dest = parseInt(dest);
  if (src < dest)
  {
    for (i=src;i<dest;i++)
    {
      setValue(row,i,getValue(row,i+1));
      setHole(row,i+1);
    }
  }
  if (dest < src)
  {
    for (i=src;i>dest;i--)
    {
      setValue(row,i,getValue(row,i-1));
      setHole(row,i-1);
    }
  }
}
function shiftHoleCol(src,dest,col)
{
  var i;
  //conversion to integer needed in some cases!
  src = parseInt(src);
  dest = parseInt(dest);
  if (src < dest)
  {//alert("src=" + src +" dest=" + dest + " col=" + col);
    for (i=src;i<dest;i++)
    {//alert(parseInt(i)+1);
      setValue(i,col,getValue(i+1,col));
      setHole(i+1,col);
    }
  }
  if (dest < src)
  {
    for (i=src;i>dest;i--)
    {
      setValue(i,col,getValue(i-1,col));
      setHole(i-1,col);
    }
  }
}
function move(obj)
{
  var r, c, hr, hc;
  if (gintervalid==-1 && !gshuffling) 
  {
    alert('กดที่ปุ่ม "เริ่มเล่น GAME" ก่อนครับ')
    return;
  }
  r = getRow(obj);
  c = getCol(obj);
  if (isHole(r,c)) return;
  hc = getHoleInRow(r);
  if (hc != -1)
  {
    shiftHoleRow(hc,c,r);
    gmoves++;
    checkWin();
    return;
  }
  hr = getHoleInCol(c);
  if (hr != -1)
  {
    shiftHoleCol(hr,r,c);
    gmoves++;
    checkWin();
    return;
  }
}
function shuffle()
{
  var t,i,j,s,frac;
  gshuffling =  true;
  frac = 100.0/(gsize*(gsize+10));
  s = "% ";
  for (i=0;i<gsize;i++)
  {
    s += "|";
    for (j=0;j<gsize+10;j++)
    {  
      window.status = "Loading " + Math.round((i*(gsize+10) + j)*frac) + s  
      if (j%2==0)
      {
        t = r0(gsize);
        while (t == ghrow) t = r0(gsize); //skip holes
        getCell(t,ghcol).click();
      } 
      else
      {
        t = r0(gsize);
        while (t == ghcol) t = r0(gsize); //skip holes
        getCell(ghrow,t).click();
     }
    }
  }
  window.status = "";
  gshuffling = false;
}
function loadBoard(size)
{
  gsize = size;
  board.innerHTML = showTable(gsize);
  setHole(gsize-1,gsize-1);
  //shuffle();
}
      </script>
<center>
<table border=5 width="629" cellpadding=0 cellspacing=0 bordercolorlight="#FF0000" bordercolordark="#0000FF">
<tr><td width="587" bgcolor="#99CCFF">
    <p align="center"><input type=button id=butHelp value="ซ่อนวิธีการเล่น" class="but" onclick="toggleHelp()" style="font-family: Microsoft Sans Serif; font-size: 10pt; color: #FF0000; background-color: #FFFF99; border-style: dotted; border-color: #000000"></p>
  </td>
</tr>
<tr id=help><td width="607" bgcolor="#99FFCC">
    <p align="center"><font face="MS Sans Serif" size="4">1.เลือก
    LEVEL ที่ต้องการเล่นก่อนครับ
    โดยจะมีตั้งแต่ LEVEL 1 - LEVEL 10 ครับ<br>
    2.กดที่ปุ่ม &quot;<b><font color="#FF0000">เริ่มเล่น
    GAME</font></b>&quot; ครับ
    แล้วรอสักครู่จนกว่าจะมีตัวเลขมาจับเวลาการเล่นด้านล่างปุ่มครับ<br>
    3.เริ่มทำการเรียงเลขครับ
    โดยให้ &quot;<font color="#FF0000"><b>เริ่มเลข 1
    ที่ช่องบนสุด ฝั่ง ซ้ายสุด
    แล้วก็เรียงต่อมาเรื่อยๆครับ</b></font>&quot;</font></p>
  </td></tr>
</table>
<hr width="75%" color="#0000FF">
<div id=test></div>
<font face="MS Sans Serif" size="1" color="#FF0000"><b><h3>เลือก LEVEL
ที่ต้องการเล่น : </h3></b>
<select id=level onchange="loadBoard(parseInt(level.value))" style="font-family: Microsoft Sans Serif; font-size: 10pt; color: #000000; background-color: #CCFFCC; border-style: dotted; border-color: #FF0000" size="1">
<option value='3'>3</option>
<option value='4' selected>4</option>
<script>
for (var i=5;i<=10;i++)
{
  document.write("<option value='" + i + "'>" + i + "</option>");
}
</script>
</select><br>
<br>
<input type=button class=but value="เริ่มเล่น GAME" onclick="startGame();" style="font-family: Microsoft Sans Serif; font-size: 10pt; color: #0000FF; background-color: #FFCC66; border-style: dashed; border-color: #0000FF">
<table cellpadding=4>
<tr><td align=center id=fldStatus class=capt2>

</td></tr>
<button class="btn btn-primary"type="reset" name="button2" id="button2" value="Reset"><img src=img/reset.png width="26" height="20" align="absmiddle"value="Reset"abbr title="Reset"onclick="javascript:location.reload();"></button>
									
</table>
</font>
<div id=board></div>      <p align="center">
      <!--<img border="0" src="../../../imagesunder/bd21313_2.gif" width="492" height="19"><br>-->
      <br>
&nbsp;</td>
    </tr>
  </table><p>CR.http://www.codetukyang.com/playgame/js/pages/page8.htm</p>
</div>

</body>

</html>