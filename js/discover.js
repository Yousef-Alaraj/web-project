const container = document.getElementById("eventsContainer");
const refreshBtn = document.getElementById("refreshBtn");

const TM_API_KEY = "QmNIjh4WkSWX7N0SwJjiiaQv6WBL2aAA";

async function fetchEvents() {
  container.innerHTML = "Loading...";

  try {
    const res = await fetch(
      `https://app.ticketmaster.com/discovery/v2/events.json?apikey=${TM_API_KEY}&size=6&countryCode=US`
    );

    const data = await res.json();

    if (!data._embedded) {
      container.innerHTML = "No events found.";
      return;
    }

    displayEvents(data._embedded.events);

  } catch (err) {
    container.innerHTML = "Error loading events.";
    console.error(err);
  }
}

async function getWeather(lat, lon) {
  try {
    const res = await fetch(
      `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true`
    );
    const data = await res.json();
    return data.current_weather.temperature + "°C";
  } catch {
    return "N/A";
  }
}


function getFacts(name) {
  return [
    `${name} is expected to attract a large crowd.`,
    "Events like this boost local tourism.",
    "A great chance to explore something new!"
  ];
}

async function displayEvents(events) {
  container.innerHTML = "";

  for (let event of events) {
    const venue = event._embedded.venues[0];

    const lat = venue.location ? venue.location.latitude : null;
    const lon = venue.location ? venue.location.longitude : null;

    const weather = lat ? await getWeather(lat, lon) : "N/A";
    const facts = getFacts(event.name);

    const card = document.createElement("div");
    card.classList.add("event");

    card.innerHTML = `
    <img src="${event.images[0].url}" style="width:250px; height:auto; border-radius:10px;">
    <h2>${event.name}</h2>
      <p><b>Date:</b> ${event.dates.start.localDate}</p>
      <p><b>Location:</b> ${venue.name}</p>
      <p><b>Weather:</b> ${weather}</p>


      <p><b>Fun Facts:</b></p>
        ${facts.map(f => `<p>${f}</p>`).join("")}
    `;

    container.appendChild(card);
  }
}

refreshBtn.addEventListener("click", fetchEvents);

fetchEvents();