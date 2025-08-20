function calculateBMI() {
    const height = document.getElementById('height').value / 100;
    const weight = document.getElementById('weight').value;

    if (height && weight) {
        const bmi = (weight / (height * height)).toFixed(2);
        let message = '';

        if (bmi < 18.5) {
            message = 'Underweight';
        } else if (bmi < 24.9) {
            message = 'Normal weight';
        } else if (bmi < 29.9) {
            message = 'Overweight';
        } else {
            message = 'Obesity';
        }

        document.getElementById('result').innerText = `Your BMI is ${bmi} (${message})`;
    } else {
        document.getElementById('result').innerText = 'Please enter valid height and weight!';
    }
}
