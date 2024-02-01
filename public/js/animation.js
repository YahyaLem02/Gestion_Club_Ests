// const clubs = [{
//         title: "Club Musique",
//         description: "Le Club Musique est une plateforme dynamique pour les mélomanes et les musiciens passionnés. Nous organisons des concerts, des ateliers de composition musicale et des sessions d'apprentissage pour perfectionner vos compétences musicales. Rejoignez-nous pour explorer le monde mélodieux de la musique ensemble !",
//         image: "images/musique.jpg"
//     },
//     {
//         title: "Club Nakama (Culture Asiatique)",
//         description: "Le Club Nakama célèbre la richesse et la diversité de la culture asiatique. Nous organisons des événements culturels, des projections de films, des ateliers de cuisine et des discussions sur divers aspects de la culture asiatique. Rejoignez-nous pour découvrir et apprécier cette fascinante culture avec d'autres passionnés !",
//         image: "images/nakama.jpg"
//     },
//     {
//         title: "Club Close-Up de Communication et Débat",
//         description: "Le Club Close-Up de Communication et Débat est dédié au développement des compétences de communication, de débat et d'éloquence. Nous organisons des séances interactives, des débats stimulants et des formations pour améliorer vos aptitudes communicationnelles. Rejoignez-nous pour affûter votre esprit critique et votre aisance à l'oral !",
//         image: "images/closeup.jpg"
//     },
//     {
//         title: "Club de Théâtre",
//         description: "Le Club de Théâtre est un espace pour les passionnés de théâtre. Nous organisons des représentations théâtrales, des ateliers d'improvisation, des lectures de scénarios et des séances de formation pour développer vos compétences théâtrales. Rejoignez-nous pour explorer le monde de l'art dramatique !",
//         image: "images/theatre.jpg"
//     },
//     {
//         title: "Club Robotics et IA",
//         description: "Le Club Robotics et IA est dédié à la science et à la technologie. Nous nous concentrons sur la conception, la programmation et la construction de robots ainsi que sur l'intelligence artificielle. Nous organisons des compétitions, des workshops et des séminaires pour explorer les avancées de la robotique et de l'IA. Rejoignez-nous pour créer, innover et repousser les limites de la technologie !",
//         image: "images/robotic.jpg"
//     }
// ];
// let currentClubIndex = 0;
// function displayClubInfo() {
//     const clubTitle = document.getElementById("club-title");
//     const clubDescription = document.getElementById("club-description");
//     const clubImage = document.getElementById("club-image");

//     clubTitle.textContent = clubs[currentClubIndex].title;
//     clubDescription.textContent = clubs[currentClubIndex].description;
//     clubImage.innerHTML = `<img src="${clubs[currentClubIndex].image}" alt="${clubs[currentClubIndex].title}">`;

//     currentClubIndex = (currentClubIndex + 1) % clubs.length;
// }

// setInterval(displayClubInfo, 5000);

// window.onload = function() {
//     displayClubInfo();
// };

