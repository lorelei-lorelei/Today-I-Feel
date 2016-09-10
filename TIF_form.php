<?php
include 'TIF_login_functions.php';

session_start();

require_login();
validate_logout();

?>

<HTML>
  <meta charset='utf-8'>
  <head>
    <title>Today I Feel..</title>
    <h1> Today I Feel...</h1>
  <body>
    <form action = "/TIF_form.php" method = "post" enctype="multipart/form-data">

      <input type="hidden" name="MAX_FILE_SIZE" value="100000000">

      <label for="Sleep hours">How many hours sleep did you get last night?</label>
      <select name="Sleep hours">
        <option value="8+ hours">8+ hours</option>
        <option value="6-8 hours">6-8 hours</option>
        <option value="3-6 hours">3-6 hours</option>
        <option value="1-3 hours">1-3 hours</option>
        <option value="0 hours">0 hours</option>
      </select>
      <br>
      <label for="Hunger or Thirst">When did you last eat or drink?</label>
      <select name="Hunger or Thirst">
        <option value="Just eaten">Just eaten</option>
        <option value="3-4 hours ago">3-4 hours ago</option>
        <option value="5 or more hours ago">5 or more hours ago</option>
        <option value="More than 12 hours ago">More than 12 hours ago</option>
      </select>
      <br>
      <label for="Unwell">Are you sick?</label>
      <select name="Unwell">
        <option value="Full of beans!">Full of beans!</option>
        <option value="Fine">Fine</option>
        <option value="A little sniffly">A little sniffly</option>
        <option value="Sick as a parrot">Sick as a parrot</option>
      </select>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th> Rate these areas of your life from 1-5 (1 = very stressful 5 = perfectly balanced)</th>
          </tr>
        </thead>
        <tbody>
          <form>
            <tr>
              <td>
                <div class="radiotext">
                  <label for='1'>Family</label>
                </div>
              </td>
            </tr>
            <td>
              <div class="radio">
                <label><input type="radio" value='1' name="family">1</label>
                <label><input type="radio" value='2' name="family">2</label>
                <label><input type="radio" value='3' name="family">3</label>
                <label><input type="radio" value='4' name="family">4</label>
                <label><input type="radio" value='5' name="family">5</label>
              </div>
            </td>
            <tr>
              <td>
                <div class="radiotext">
                  <label for='1'>Friends</label>
                </div>
              </td>
            </tr>
              <td>
                <div class="radio">
                  <label><input type="radio" value='1' name="friends">1</label>
                  <label><input type="radio" value='2' name="friends">2</label>
                  <label><input type="radio" value='3' name="friends">3</label>
                  <label><input type="radio" value='4' name="friends">4</label>
                  <label><input type="radio" value='5' name="friends">5</label>
                </div>
              </td>
              <tr>
                <td>
                  <div class="radiotext">
                    <label for='1'>Work</label>
                  </div>
                </td>
              </tr>
                <td>
                  <div class="radio">
                    <label><input type="radio" value='1' name="work">1</label>
                    <label><input type="radio" value='2' name="work">2</label>
                    <label><input type="radio" value='3' name="work">3</label>
                    <label><input type="radio" value='4' name="work">4</label>
                    <label><input type="radio" value='5' name="work">5</label>
                  </div>
                </td>
                <tr>
                  <td>
                    <div class="radiotext">
                      <label for='1'>Home</label>
                    </div>
                  </td>
                </tr>
                  <td>
                    <div class="radio">
                      <label><input type="radio" value='1' name="home">1</label>
                      <label><input type="radio" value='2' name="home">2</label>
                      <label><input type="radio" value='3' name="home">3</label>
                      <label><input type="radio" value='4' name="home">4</label>
                      <label><input type="radio" value='5' name="home">5</label>
                    </div>
                  </td>
                  <tr>
                    <td>
                      <div class="radiotext">
                        <label for='1'>Myself</label>
                      </div>
                    </td>
                  </tr>
                    <td>
                      <div class="radio">
                        <label><input type="radio" value='1' name="myself">1</label>
                        <label><input type="radio" value='2' name="myself">2</label>
                        <label><input type="radio" value='3' name="myself">3</label>
                        <label><input type="radio" value='4' name="myself">4</label>
                        <label><input type="radio" value='5' name="myself">5</label>
                      </div>
                    </td>
            </tr>
          </form>
        </tbody>
      </table>
      <label for="Three Words">Write 3 words to describe your day:</label>
        <input name="three_words[]" type="text">
        <input name="three_words[]" type="text">
        <input name="three_words[]" type="text">
        <br>
      <label for="image_upload">Add an image to show how you feel today:</label>
        <input name="image" type="file">
      <button type="submit">Answer</button>
      <button type="submit"><a href="?logout">Logout</a></button>
  </form>
  <br>
  <img src="Images/test.jpg" alt="test image" width="300" height="300">



<?php
print_r($_POST);
print_r($_FILES);
echo "<br>";
echo "<hr/>";

$destination = "Images/";
$sleep = $_POST["Sleep_hours"];
$nutrition= $_POST["Hunger_or_Thirst"];
$sick = $_POST["Unwell"];
$life_f = $_POST["family"];
$life_fr = $_POST["friends"];
$life_h = $_POST["home"];
$life_w = $_POST["work"];
$life_m = $_POST["myself"];
$threewords = $_POST["three_words"];

if ($sleep == "0 hours" || $sleep == "1-3 hours"){
  echo "You are suffering from lack of sleep. A lack of sleep can lower your stress threshold and decrease your ability to stay optimistic. This can leave you feeling unable to cope with things and unable to see anything positive.";
} elseif ($sleep == "3-6 hours"){
  echo "You are probably tired. This can affect your memory and concentration, making you more prone to stress.";
} elseif ($sleep == "6-8 hours"){
  echo "You are sleeping ok, but there may be other things affecting your mood.";
} elseif ($sleep == "8+ hours") {
  echo "Awesome! You are well-rested! Let's look at other things that might be making you feel emotionally wobbly.";
}

echo "<br>";

$sleep_help = "http://www.nhs.uk/Livewell/insomnia/Pages/insomniatips.aspx";

function insomnia($sleep, $sleep_help) {
  if ($sleep == "0 hours" || $sleep == "1-3 hours"){
  echo "For help with insomnia, check out $sleep_help.";
}  }

insomnia($sleep, $sleep_help);

$file = fopen("TIF_output.txt", "a+");
$sleep_output = $_POST["Sleep_hours"];
echo $sleep_output;
fwrite($file, $sleep_output . "\n");
fclose($file);

echo "<br>";
echo "<hr/>";

if ($nutrition == "More than 12 hours ago"){
  echo "If you are skipping meals or undereating this will affect your mood, stress and anxiety levels. Please consider speaking to your GP about this.";
} elseif ($nutrition == "5 or more hours ago"){
  echo "You are hungry. Hunger can affect your mood, stress levels, concentration levels and ability to deal with day to day demands. Maybe it's time for a snack?";
} elseif ($nutrition == "3-4 hours ago"){
  echo "You are probably thirsty rather than hungry. Dehydration can make it harder to concentrate and make brain tasks seem more stressful than usual. Why not drink a glass of water and see if it helps?";
} elseif ($nutrition == "Just eaten") {
  echo "Awesome! You are taking good care of your physical self which will also help your mental state. Let's look at other things that might be making you feel emotionally wobbly.";
}

echo "<br>";

$nutrition_help = "http://www.nhs.uk/conditions/Eating-disorders/Pages/Introduction.aspx";

function diet($nutrition, $nutrition_help) {
  if ($nutrition == "I don't remember"){
    echo "If you are struggling with your eating or other food issues, please contact your GP: $nutrition_help.";
  } }

  diet($nutrition, $nutrition_help);

  $file = fopen("TIF_output.txt", "a+");
  $nutrition_output = $_POST["Hunger_or_Thirst"];
  echo $nutrition_output;
  fwrite($file, $nutrition_output . "\n");
  fclose($file);

echo "<br>";
echo "<hr/>";

if ($sick == "Sick as a parrot" || $sick == "A little sniffly"){
  echo "Being physically unwell can also affect your stress levels and leave you feeling more emotional than usual.";
}

$file = fopen("TIF_output.txt", "a+");
$sick_output = $_POST["Unwell"];
echo $sick_output;
fwrite($file, $sick_output . "\n");
fclose($file);

echo "<br>";
echo "<hr/>";

if ($life_f == '1'){
  echo "Your family can form a key part of your support network. A strong support network can help with managing stress and big life changes.";
}

$file = fopen("TIF_output.txt", "a+");
$lifef_output = $_POST["family"];
echo $lifef_output;
fwrite($file, $lifef_output . "\n");
fclose($file);

echo "<br>";
echo "<hr/>";

if ($life_fr == '1'){
  echo "Your friends can form a key part of your support network. A strong support network can help with managing stress and big life changes.";
}

$file = fopen("TIF_output.txt", "a+");
$lifefr_output = $_POST["friends"];
echo $lifefr_output;
fwrite($file, $lifefr_output . "\n");
fclose($file);

echo "<br>";
echo "<hr/>";

if($life_h == '1'){
  echo "Problems at home can have a huge impact on your mental health.";
}

echo "<br>";

$shelter = "http://england.shelter.org.uk/get_advice";
$shelter_dabuse = "http://england.shelter.org.uk/get_advice/domestic_abuse";

function domestic_issues($life_h, $shelter, $shelter_dabuse){
  if ($life_h == '1'){
    echo "If you are struggling with housing issues or domestic abuse, Shelter can help:$shelter and $shelter_dabuse.";
  }
}

domestic_issues($life_h, $shelter, $shelter_dabuse);

$file = fopen("TIF_output.txt", "a+");
$lifeh_output = $_POST["home"];
echo $lifeh_output;
fwrite($file, $lifeh_output . "\n");
fclose($file);

echo "<br>";
echo "<hr/>";

if($life_w == '1'){
  echo "Work/life balance is important for your mental health and lowering your stress levels. Try not to let work take over your life.";
}

echo "<br>";

$wlb = "https://www.mentalhealth.org.uk/a-to-z/w/work-life-balance";

function work_life_balance($life_w, $wlb){
  if($life_w == '1'){
    echo "Everyone struggles with work/life balance from time to time. Here are some helpful tips on how you and your employer can work together to improve things: $wlb";
  }
}

work_life_balance($life_w, $wlb);

$file = fopen("TIF_output.txt", "a+");
$lifew_output = $_POST["work"];
echo $lifew_output;
fwrite($file, $lifew_output . "\n");
fclose($file);

echo "<br>";
echo "<hr/>";

if($life_m == '1' || $life_m == '2'){
  echo "Taking time for yourself is a key way to keep your mental health in check and reduce stress. Why not do something nice for yourself?";
}

$file = fopen("TIF_output.txt", "a+");
$lifem_output = $_POST["myself"];
echo $lifem_output;
fwrite($file, $lifem_output . "\n");
fclose($file);

$file = fopen("TIF_output.txt", "a+");
$threewords = $_POST["three_words"];
echo $threewords;
fwrite($file, join(", ", $threewords) . "\n");
fclose($file);

move_uploaded_file($_FILES["image"]["tmp_name"] , $destination . "test.jpg");
