const handleClick = ( input='')  => {
    const data = document.getElementById('number');
    const text = input || data.value;
    if (input){
        data.value = input;
    }
    const button = document.querySelector('.container__button');
    const title = document.querySelector('.container__title');
    const re = /^(\s*)(\-|\+)?\d{1,}(\s*)$/;
    console.log(text.match(re));
    if (!re.test(text)){
        title.classList.add('error');
        title.textContent = 'Not a number!';
        data.classList.add('shake');
        data.classList.add('error');
        button.style.display = 'none';
        setTimeout(()=>{
            data.classList.remove('shake');
            data.classList.remove('error'); 
            title.classList.remove('error');
            title.textContent = 'Check number'
            button.style.display = 'block';
            data.value='';
        }
        ,1000)
    }
    else {
        title.classList.add('pass');
        title.textContent = 'It\'s a number!';
        data.classList.add('pass');
        button.style.display = 'none';
        setTimeout(()=>{
            data.classList.remove('pass'); 
            title.classList.remove('pass');
            title.textContent = 'Check number'
            button.style.display = 'block';
            data.value='';
        }
        ,1000)
    }
}

document.addEventListener("DOMContentLoaded",function(){
        const buttons = document.querySelectorAll('.container__option');
        for (let i=0;i<buttons.length;i++){
            buttons[i].addEventListener('click',function(){
                handleClick(this.textContent);
            })
        }     
        const separator = document.getElementById('separator');
        const container = document.querySelector('.row'); 
        separator.addEventListener('click',()=>{
            container.style.padding = '.4rem';
            container.style.height = 'unset';
            
        })
});

