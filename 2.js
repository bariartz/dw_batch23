const newN = (N) => {
    N[0] = N[0] - 7;
    const newArr = [];
    for(let i = N.length-1; i >= 0; i--){
        newArr.push(N[i]);
    }
    return newArr;
}
const N = [19,22,3,28,26,17,18,4,28,0];

console.log(newN(N));