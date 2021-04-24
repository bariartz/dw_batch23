const printPattern = (n) => {
    const text = ["D", "U", "M", "B", "W", "A", "Y", "S", "I", "D", "U", "J", "I", "A", "N"];
    const textBawah = ["U", "J", "I", "A", "N"];
    const txt = "DUMBWAYSIDUJIAN";

    let str = "";
    let count = 0;

    for(let i = 1; i <= n; i++){
        for(let j = 1; j < n - i + 2; j++){
            str += " ";
        }

        for (let k = 0; k < i; k++){
            str += text[count] + " ";
            count++;
        }

        str += "\n";
    }

    return str;
}

console.log(printPattern(5));