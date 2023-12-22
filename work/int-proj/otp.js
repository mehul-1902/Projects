var num='0123456789'
var otp=''
for(let i=1;i<5;i++)
{
    otp=otp+Math.floor(Math.random()*num.length)
}

console.log(otp);