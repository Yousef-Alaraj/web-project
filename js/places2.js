
const { useState,useEffect } = React;


function FavouritesCheckbox({ showFavourites, setShowFavourites }) {
  return (
    <>
    <div className="favouritesCheckboxContainer">
        {/* <br></br>
        <br></br> */}
     <label>
                    show favourites

                   
                    
        </label>
    <input
      name="favourites"
      type="checkbox"
      checked={showFavourites}
      onChange={(e) => setShowFavourites(e.target.checked)}
    />
    </div>
    <br></br>
    </>
  );
}


function Search({searchVal,setSearchVal}){
    return(
        <>

         <section className="search">

                
                <input type="text" name="search-bar" placeholder="Search.." className="search-bar" value={searchVal} onChange={(e)=>setSearchVal(e.target.value)}></input>

            </section>
        </>
    )
}

function Categories({categoryList,setCategoryList}){

    return (

        <>
           <div className="category-filter filter">
                <span>Category:</span>
                <br></br>
                
                <label>
                    Adventure & Eco
                    <input name="category" type="checkbox" value="Adventure & Eco" checked={categoryList["Adventure & Eco"]} onChange={(e)=>{
                        const newList = {...categoryList};
                        newList["Adventure & Eco"] = e.target.checked ? 1 : 0;
                        setCategoryList(newList);
                    }}></input>
                </label>
                
                <label>
                    History & culture
                    <input name="category" type="checkbox" value="History & Culture" checked={categoryList["History & Culture"]} onChange={(e)=>{
                        const newList = {...categoryList};
                        newList["History & Culture"] = e.target.checked ? 1 : 0;
                        setCategoryList(newList);
                    }}></input>
                </label>
                
                <label>
                    Leisure & wellness
                    <input name="category" type="checkbox" value="Leisure & Wellness" checked={categoryList["Leisure & Wellness"]} onChange={(e)=>{
                        const newList = {...categoryList};
                        newList["Leisure & Wellness"] = e.target.checked ? 1 : 0;
                        setCategoryList(newList);
                    }}></input>
                </label>
                
                <label>
                    Religious & faith
                    <input name="category" type="checkbox" value="Religious & Faith" checked={categoryList["Religious & Faith"]} onChange={(e)=>{
                        const newList = {...categoryList};
                        newList["Religious & Faith"] = e.target.checked ? 1 : 0;
                        setCategoryList(newList);
                    }}></input>
                </label>
            </div>
            <br></br>
            <hr></hr>
        </>

    )

}


function Card(props) {

    


    //  const [favourite, setFavourite] = useState(false);
    return (
        <div className="card" id={props.id}>

            <h3 className="place-name">
                {props.name}
            </h3>

            <img 
                src={props.images[0]} 
                alt={props.name}
            />

            <div className="place-info">

                <span className="category">
                    {props.category_name}
                </span>

                <span className="rating">
                    {props.rating} ⭐
                </span>

            </div>

            <div className="place-bottom">

                <p>{props.description}</p>

                <br />

                <div className="bottom-container">

                    <a href={`place-details.html?id=${props.id}`}>
                        view details
                    </a>

                    <label>
                        add to favourites

                        <input 
                            type="checkbox"
                            checked={props.favourites[props.id] === 1}
                             onChange={(e) => {
                                const newFavourites = [...props.favourites];
                                newFavourites[props.id] = e.target.checked ? 1 : 0;
                                props.setFavourites(newFavourites);
                                const postData={
                                    user_id:1,
                                    place_id:props.id,
                                    action:e.target.checked ? "add" : "remove"

                                }
                                
                                fetch("http://localhost/web-project/favouritesUpdate.php", {
                                method: "POST",
                                body: new URLSearchParams(postData)
                                })
                            .then(response => response.text())
                            .then(data => console.log(data));
                            }}
                        

                            

                        />
                    </label>

                </div>

            </div>

        </div>
    );
}


const root = ReactDOM.createRoot(
    document.querySelector(".main")
);



function App() {


  const [jordanDestinations, setJordanDestinations] = useState([]);

   useEffect(() => {
  fetch("http://localhost/web-project/getPlaces.php")
    .then(response => response.json())
    .then(data => {
      const fixedData = data.map(destination => {
        return {
          ...destination,
          images: JSON.parse(destination.images)
        };
      });

      setJordanDestinations(fixedData);
    });
}, []);


  const [categoryList, setCategoryList] = useState({
    "Adventure & Eco": false,
    "History & Culture": false,
    "Leisure & Wellness": false,
    "Religious & Faith": false
  });

  const [searchVal, setSearchVal] = useState("");

  const [showFavourites, setShowFavourites] = useState(false);

  const [favourites, setFavourites] = useState(
    Array(9).fill(0)
  );

  
   useEffect(() => {
  fetch("http://localhost/web-project/getFavourites.php")
    .then(response => response.json())
    .then(data =>{
        console.log(data)
        let newArr=Array(9).fill(0)
        
        for (let j=0;j< 9;j++){
            if (data.includes(j)) newArr[j]=1
        }
        setFavourites(newArr)
        console.log(newArr)
    })
      
    }, []);


  return (
    <>

      <section className="filters">
        <h2>filters</h2>

        <Categories
          categoryList={categoryList}
          setCategoryList={setCategoryList}
        />

        <FavouritesCheckbox
          showFavourites={showFavourites}
          setShowFavourites={setShowFavourites}
        />
      </section>

      <section className="place-cards">

        <section className="search">
          <Search
            searchVal={searchVal}
            setSearchVal={setSearchVal}
          />
        </section>

        <hr />

        <section className="cards">
          <div className="cards-container">
            {jordanDestinations
              .filter(destination =>
                (!showFavourites || favourites[destination.id] === 1) &&
                (
                  Object.values(categoryList).every(value => value == false) ||
                  categoryList[destination.category_name]
                ) &&
                JSON.stringify(destination)
                  .toLowerCase()
                  .includes(searchVal.toLowerCase())
              )
              .map(destination => (
                <Card
                  key={destination.id}
                  {...destination}
                  favourites={favourites}
                  setFavourites={setFavourites}
                />
              ))}
          </div>
        </section>

      </section>

   </>
  );
}

root.render(<App />);







// const jordanDestinations0 = [
//     // Adventure & Eco
//     {
//         id: 1,
//         name: "Jordan Trail",
//         categoryId: "adventure-eco",
//         categoryName: "Adventure & Eco",
//         location: "Country-wide",
//         description: `The Jordan Trail is a ~675km long-distance hiking route traversing Jordan from Um Qais in the north to Aqaba on the Red Sea in the south. Completed in roughly 35–40 days, the trail crosses diverse landscapes—including northern forests, rugged wadis, Petra, and Wadi Rum—while passing through 75 villages to showcase local culture, cuisine, and history.`,
//         tags: ["hiking", "nature", "outdoor"],
//         rating: 3.8,
//         tripDuration: "35-40 days (full trail)",
//         fee: "Free (unguided)",
//         contactNumber: "+962 6 461 3234",
//         images: [
//             "assets/images/jordan-trail-1.jpeg",
//             "assets/images/jordan-trail-2.jpeg",
//             "assets/images/jordan-trail-3.jpeg",
//             "assets/images/jordan-trail-4.jpeg",
//         ]
//     },
//     {
//         id: 2,
//         name: "JBW Jordan Birdwatch",
//         categoryId: "adventure-eco",
//         categoryName: "Adventure & Eco",
//         location: "Various Locations",
//         description: `Jordan BirdWatch (JBW) is a registered Jordanian association dedicated to protecting wild birds and their habitats through science-based conservation, monitoring, and awareness. Founded by ornithologists and conservationists, JBW promotes eco-tourism, conducts field research, provides capacity building for guides, and works with local communities to conserve bird populations.`,
//         tags: ["wildlife", "conservation", "eco-tourism"],
//         rating: 2.5,
//         tripDuration: "Half-day to multi-day tours",
//         fee: "Varies by tour package",
//         contactNumber: "+962 7 9123 4567",
//         images: [
//             "assets/images/jbw-1.jpeg",
//             "assets/images/jbw-2.jpeg",
//             "assets/images/jbw-3.jpeg",
//             "assets/images/jbw-4.jpeg",
//         ]
//     },

//     // History & Culture
//     {
//         id: 3,
//         name: "Petra",
//         categoryId: "history-culture",
//         categoryName: "History & Culture",
//         location: "Ma'an Governorate",
//         description: `Petra is a renowned UNESCO World Heritage site and "New Seven Wonders of the World" location in southern Jordan. Founded over 2,000 years ago by the Nabataeans, it is a magnificent desert city carved directly into vibrant rose-red sandstone cliffs, showcasing Hellenistic architecture like the Treasury (Al-Khazneh) and ancient water management systems.`,
//         tags: ["archaeology", "unesco", "nabataean"],
//         rating: 3.9,
//         tripDuration: "1 to 3 days",
//         fee: "50 JOD (1-day pass)",
//         contactNumber: "+962 3 215 6060",
//         images: [
//             "assets/images/petra-1.jpeg",
//             "assets/images/petra-2.jpeg",
//             "assets/images/petra-3.jpeg",
//             "assets/images/petra-4.jpeg",
//         ]
//     },
//     {
//         id: 4,
//         name: "Jerash",
//         categoryId: "history-culture",
//         categoryName: "History & Culture",
//         location: "Jerash Governorate",
//         description: `Jerash, located 30 miles north of Amman, houses one of the world's best-preserved Roman provincial cities. Known as "Pompeii of the East," the ruins feature a colonnaded Oval Plaza, two massive theaters, the Temple of Artemis, and the 800m-long Cardo Maximus, all buried by sand for centuries.`,
//         tags: ["roman ruins", "ancient city", "architecture"],
//         rating: 3.7,
//         tripDuration: "3 to 4 hours",
//         fee: "10 JOD",
//         contactNumber: "+962 2 634 1234",
//         images: [
//             "assets/images/jerash-1.jpeg",
//             "assets/images/jerash-2.jpeg",
//             "assets/images/jerash-3.jpeg",
//             "assets/images/jerash-4.jpeg",
//         ]
//     },

//     // Leisure & Wellness
//     {
//         id: 5,
//         name: "Dead Sea",
//         categoryId: "leisure-wellness",
//         categoryName: "Leisure & Wellness",
//         location: "Jordan Rift Valley",
//         description: `The Dead Sea is a hypersaline lake that runs through Jordan, renowned as the lowest point on Earth (over 400m below sea level). Known for its extreme salinity—roughly 10 times saltier than the ocean—it allows for effortless floating and features therapeutic mineral-rich mud. Its waterless, barren landscape attracts tourists for wellness tourism and health benefits.`,
//         tags: ["spa", "relaxation", "lowest point"],
//         rating: 4.6,
//         tripDuration: "Half-day to 1 day",
//         fee: "Free (public) to 20+ JOD (resort access)",
//         contactNumber: "+962 5 356 1234",
//         images: [
//             "assets/images/dead-sea-1.jpeg",
//             "assets/images/dead-sea-2.jpeg",
//             "assets/images/dead-sea-3.jpeg",
//             "assets/images/dead-sea-4.jpeg",
//         ]
//     },
//     {
//         id: 6,
//         name: "Ma'in Hot Springs (Hammamat Ma'in)",
//         categoryId: "leisure-wellness",
//         categoryName: "Leisure & Wellness",
//         location: "Madaba Governorate",
//         description: `Ma'in Hot Springs (Hammamat Ma'in) are natural thermal mineral waterfalls and springs located in Jordan, 264 meters below sea level near the Dead Sea. Renowned since Roman times, these hot, therapeutic waters (up to 63°C) cascade down cliffs, offering a premier spa and wellness destination.`,
//         tags: ["hot springs", "resort", "waterfalls"],
//         rating: 4.4,
//         tripDuration: "2 to 4 hours",
//         fee: "15 JOD",
//         contactNumber: "+962 5 325 2000",
//         images: [
//             "assets/images/ma'in-1.jpeg",
//             "assets/images/ma'in-2.jpeg",
//             "assets/images/ma'in-3.jpeg",
//             "assets/images/ma'in-4.jpeg",
//         ]
//     },

//     // Religious & Faith
//     {
//         id: 7,
//         name: "The Cave of the Seven Sleepers (Ahl Al-Kahf)",
//         categoryId: "religious-faith",
//         categoryName: "Religious & Faith",
//         location: "Amman",
//         description: `The Cave of the Seven Sleepers is a religious and historical site, prominently located near Amman, Jordan (Al-Rajib) and Ephesus, Turkey, associated with a miraculous tale in both Islamic (Surat al-Kahf) and Christian traditions. It tells of young men who slept in a cave for over 300 years to escape persecution.`,
//         tags: ["islamic history", "shrine", "cave"],
//         rating: 4.5,
//         tripDuration: "1 to 2 hours",
//         fee: "Free (donations accepted)",
//         contactNumber: "+962 6 478 1234",
//         images: [
//             "assets/images/cave-of-the-seven-sleepers-1.jpeg",
//             "assets/images/cave-of-the-seven-sleepers-2.jpeg",
//             "assets/images/cave-of-the-seven-sleepers-3.jpeg",
//             "assets/images/cave-of-the-seven-sleepers-4.jpeg",
//         ]
//     },
//     {
//         id: 8,
//         name: "Jordan River / Al-Maghtas",
//         categoryId: "religious-faith",
//         categoryName: "Religious & Faith",
//         location: "Balqa Governorate",
//         description: `The Jordan River is a 251-kilometer-long (156-mile) river in the Middle East flowing south from Mount Hermon through the Sea of Galilee to the Dead Sea, forming a major, low-elevation geopolitical boundary. As the world's lowest river, it is a vital, historically significant water source for Jordan and Palestine, deeply sacred to Christians, Jews, and Muslims.`,
//         tags: ["christianity", "baptism site", "unesco"],
//         rating: 4.8,
//         tripDuration: "2 to 3 hours",
//         fee: "12 JOD",
//         contactNumber: "+962 5 359 0000",
//         images: [
//             "assets/images/jordan-river-1.jpeg",
//             "assets/images/jordan-river-2.jpeg",
//             "assets/images/jordan-river-3.jpeg",
//             "assets/images/jordan-river-4.jpeg",
//         ]
//     }
// ];
