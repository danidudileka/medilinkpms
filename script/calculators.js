function calculateBMI() {
  const height = parseFloat(document.getElementById("bmi-height").value);
  const weight = parseFloat(document.getElementById("bmi-weight").value);
  const gender = document.getElementById("bmi-gender").value;
  const bmiResultElement = document.getElementById("bmi-result");
  const idealWeightResultElement = document.getElementById(
    "ideal-weight-result"
  );

  if (height > 0 && weight > 0 && gender) {
    // BMI Calculation
    const bmi = (weight / (height / 100) ** 2).toFixed(2);

    let category = "";
    if (bmi < 18.5) {
      category = "Underweight";
    } else if (bmi >= 18.5 && bmi < 24.9) {
      category = "Normal weight";
    } else if (bmi >= 25 && bmi < 29.9) {
      category = "Overweight";
    } else {
      category = "Obese";
    }

    // Ideal Weight Calculation (Devine Formula)
    let idealWeight = 0;
    if (gender === "male") {
      idealWeight = 50 + 0.9 * (height - 152.4);
    } else if (gender === "female") {
      idealWeight = 45.5 + 0.9 * (height - 152.4);
    }

    // Display Results
    bmiResultElement.textContent = `Your BMI is ${bmi} (${category})`;
    idealWeightResultElement.textContent = `Your ideal weight range is around ${idealWeight.toFixed(
      1
    )} kg.`;
  } else {
    bmiResultElement.textContent = "Please fill in all fields correctly!";
    idealWeightResultElement.textContent = "";
  }
}

function calculateCalories() {
  const age = parseInt(document.getElementById("cal-age").value);
  const gender = document.getElementById("cal-gender").value;
  const weight = parseFloat(document.getElementById("cal-weight").value);
  const height = parseFloat(document.getElementById("cal-height").value);
  const activityLevel = parseFloat(
    document.getElementById("cal-activity").value
  );
  const resultElement = document.getElementById("calorie-result");

  if (age > 0 && weight > 0 && height > 0 && gender && activityLevel) {
    // BMR Calculation
    let bmr = 0;
    if (gender === "male") {
      bmr = 10 * weight + 6.25 * height - 5 * age + 5; // Male BMR
    } else {
      bmr = 10 * weight + 6.25 * height - 5 * age - 161; // Female BMR
    }

    // TDEE Calculation
    const tdee = (bmr * activityLevel).toFixed(2);

    // Display result
    resultElement.textContent = `Your ideal daily calorie intake is approximately ${tdee} calories.`;
  } else {
    resultElement.textContent = "Please fill in all the fields correctly!";
  }
}

function calculateWater() {
  const weight = parseFloat(document.getElementById("water-weight").value);
  const activity = parseFloat(document.getElementById("water-activity").value);
  const resultElement = document.getElementById("water-result");

  if (weight > 0 && activity >= 0) {
    // Water Intake Calculation
    const baseWater = weight * 0.033;
    const additionalWater = activity * 0.5;
    const totalWater = (baseWater + additionalWater).toFixed(2);

    // Display result
    resultElement.textContent = `Your recommended daily water intake is approximately ${totalWater} liters. (The result can be changed due to health and environmental conditions)`;
  } else {
    resultElement.textContent = "Please enter valid inputs!";
  }
}
