let inpt = prompt("Masukkan input duplikasi dibawah");
const removeDuplicate = (inpt) => { 
    return inpt.split('').filter((item, pos, self) => {
      return self.indexOf(item) === pos;
    }).join('');
}
console.log(removeDuplicate(inpt));