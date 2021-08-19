//Utilisation de l'API intersection Observer, ne fonctionne pas pour IE

const getHome = document.getElementById('home')
const bubble = document.createElement('div')

const ratio = .3
const options = {                                                     // on en a besoin pour créer une instance de l'objet IntersectionOberserver (IO)
  root: null,                                                         // null parce qu'on utilise tout l'écran
  rootMargin: '0px',                                                  // marge d'intersection 
  threshold: ratio                                                    // dès que 50% de l'élément est visible on déclenche l' IO
}

const handleIntersect = function (entries, observer) {                // création de la fonction de callback, entries est un "sous objet" de IO
  entries.forEach((element) => {

    if (element.intersectionRatio > ratio) {                          // intersectionRation => propriété de l'objet entries
      
      element.target.classList.add('reveal-visible')                  // Je rajoute la class 'reveal-visible'

      observer.unobserve(element.target)                              // récupère l'objet observer et arrête d'observer.
    }      
  }
)}  

const observer = new IntersectionObserver(handleIntersect, options)   // création d'une instance l' IO

// const target = document.querySelector('.reveal')                   // élément à observer

// observer.observe(target)                                           // méthode de l'IO pour observer un élément

document.querySelectorAll('[class*="reveal-"]').forEach((r) => {      // On récupère tous les éléments qui on la class 'reveal-...' et renvoie chacun dans l'élément r
 
  observer.observe(r)                                                 // On observe chacun des éléments récupéré

})

const size = Math.random() * 50 + 300 + 'px'
console.log(size)

const waveMaker = () => {

  bubble.classList.add('wave')
  getHome.appendChild(bubble)
}

setInterval(waveMaker, 2500)