const slide1 = document.querySelector('#home')
const picts = slide1.querySelectorAll('.fist_icons')
slide1.addEventListener('mousemove',(e)=>{
            var rand = Math.random()*20
            const mouseX = e.pageX
            const mouseY = e.pageY
            //console.log('x : ',mouseX,' y: ',mouseY)
            force=1
            let moveX = mouseX/1000
            //console.log(moveX)
            let moveY = mouseY/1000
            //console.log(moveY)

            moveX = moveX*force
            //console.log(moveX)
            moveY = moveY*force
            //console.log(rand)
            picts.forEach(pict =>{
                const deltamouseX = pict.getAttribute('data-movex')
                const deltamouseY = pict.getAttribute('data-movey')
                const deltarotate = pict.getAttribute('data-rotate')
                pict.style.transform = `rotate(${deltarotate}deg) translate(${deltamouseX*moveX}%,${deltamouseY*moveY}%)`
            })
        })