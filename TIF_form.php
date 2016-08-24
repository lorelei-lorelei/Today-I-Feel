<HTML>
  <meta charset='utf-8'>
  <head>
    <title>Today I Feel..</title>
  <body>
    <form action = "/TIF_form.php" method = "post">
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
        <option value="I've just eaten">I've just eaten</option>
        <option value="3-4 hours ago">3-4 hours ago</option>
        <option value="5 or more hours ago">5 or more hours ago</option>
        <option value="I don't remember">I don't remember</option>
      </select>
      <button type="submit">Answer</button>

<?php/*How to write this to give radio buttons labelled 1-5 for each of the 5 areas?
    Rate these areas of your life from 1-5 based on how much time you feel you have for them:*/?>

<?php
//How do I get the elseif below to run based on people's choices? <ACY?

print_r($_POST);

$sleep = $_POST["Sleep_hours"];
$nutrition= $_POST["Hunger_or_Thirst"];

if ($sleep == "0 hours" || $sleep == "1-3 hours"){
  echo "You are suffering from lack of sleep. A lack of sleep can lower your stress threshold and decrease your ability to stay optimistic. This can leave you feeling unable to cope with things and unable to see anything positive.";
} elseif ($sleep == "3-6 hours"){
  echo "You are probably tired. This can affect your memory and concentration, making you more prone to stress.";
} elseif ($sleep == "6-8 hours"){
  echo "You are sleeping ok, but there may be other things affecting your mood.";
} elseif ($sleep == "8+ hours") {
  echo "Awesome! You are well-rested! Let's look at other things that might be making you feel emotionally wobbly.";
}

if ($nutrition == "I don't remember"){
  echo "If you are skipping meals or undereating this will affect your mood, stress and anxiety levels. Please consider speaking to your GP about this.";
} elseif ($nutrition == "5 or more hours ago"){
  echo "You are hungry. Hunger can affect your mood, stress levels, concentration levels and ability to deal with day to day demands. Maybe it's time for a snack?";
} elseif ($nutrition == "3-4 hours ago"){
  echo "You are probably thirsty rather than hungry. Dehydration can make it harder to concentrate and make brain tasks seem more stressful than usual. Why not drink a glass of water and see if it helps?";
} elseif ($nutrition == "I've just eaten") {
  echo "Awesome! You are taking good care of your physical self which will also help your mental state. Let's look at other things that might be making you feel emotionally wobbly.";
}
