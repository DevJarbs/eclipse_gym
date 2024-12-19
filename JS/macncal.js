function calculate() {
    const gender = document.getElementById('gender').value;
    const age = parseInt(document.getElementById('age').value);
    const weight = parseFloat(document.getElementById('weight').value);
    const height = parseFloat(document.getElementById('height').value);
    const activity = parseFloat(document.getElementById('activity').value);
    const goal = parseInt(document.getElementById('goal').value);

    if(!age || !weight || !height || !activity){
        document.getElementById('result').innerHTML = "Please fill all fields.";
        return;
    }

    let bmr;
    if(gender === 'male'){
        bmr = 10 * weight + 6.25 * height - 5 * age + 5;
    }else{
        bmr = 10 * weight + 6.25 * height - 5 * age - 161;
    }

    
    const tdee = bmr * activity;
    const calories = tdee + goal;
    const protein = (calories * 0.3) / 4;
    const carbs = (calories * 0.4) / 4;
    const fat = (calories * 0.3) / 9;

    document.getElementById('result').innerHTML = `
        <strong>Results:</strong><br>
        Total Calories: ${calories.toFixed(2)} kcal/day<br>
        Protein: ${protein.toFixed(2)} g/day<br>
        Carbs: ${carbs.toFixed(2)} g/day<br>
        Fat: ${fat.toFixed(2)} g/day
    `;
}
