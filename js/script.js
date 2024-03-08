
document.querySelectorAll('.plusDeDetail').forEach(produit=>{
    produit.addEventListener('click',e=>{
        const targetDiv = "."+ e.target.dataset.produit+" .description"
        const targetSvgD = "."+ e.target.dataset.produit+" .arrowDown"
        const targetSvgR = "."+ e.target.dataset.produit+" .arrowRight"
        $(targetDiv).toggle(300)
        $(targetSvgD).toggle(300)
        $(targetSvgR).toggle(300)

    })
})

document.querySelectorAll('.description a').forEach(bouton=>{
    bouton.addEventListener('click',(e)=>{
        e.stopPropagation()
        localStorage.setItem('avis',e.target.dataset.produit)
    })
})


const productSelect = "option[value='"+localStorage.getItem('avis') +"']"
document.querySelector(productSelect)?.setAttribute('selected','')

const avisMenu = "a[href='2-apple-tous-les-avis.html']"
document.querySelector(avisMenu).addEventListener('click',e=>{
    localStorage.removeItem('avis')
})


document.querySelector('.star')?.addEventListener('click',e=>{
    if(e.target.tagName == "SPAN"){
        document.querySelector('.star span[data-clicked]')?.removeAttribute('data-clicked')
        e.target.setAttribute('data-clicked',"true")
        const rating = e.target.dataset.rating
        document.querySelector('#rating').value=rating
    }
})

document.querySelectorAll('.noteStar')?.forEach((note)=>{
    const notation = note.dataset.note
    note.querySelector("span[data-rate='"+notation+"']").classList.add('noteMise')
})

const optionSelected = document.querySelector('select')?.dataset.value
if(optionSelected) document.querySelector("option[value='"+optionSelected+"']").setAttribute('selected','')

const titles = gsap.utils.toArray('.text-wrapper > p')
const tl = gsap.timeline({repeat:-1,
                        repeatDelay:0})

titles.forEach(title=>{
    const titleLetter = [...title.innerText]
    title.innerText=''
    titleLetter.forEach(letter=>{
        const span = document.createElement('span')
        span.classList.add('letter')
        span.innerText = letter
        if(letter===" ") {
            if(window.innerWidth<850){
                span.style.width="1.5rem"
            }else{
                span.style.width="3rem"
            }
           }
        title.appendChild(span)
    })
   
    tl.from(title.childNodes,{
        opacity:0,
        y:80,
        rotateX:-90,
        stagger:.05
    },"<").to(title.children,{
        opacity:1,
        y:0,
        rotateX:0,
    },"<2")
    .to(title.childNodes,{
        opacity:0,
        y:-80,
        rotateX:90,
        stagger:.05
    },"<1")
    

})

