@extends("layout.app")

@push('style')
<style>
    .pt-160 {
        padding-top: 160px;
    }

    .pb-40 {
        padding-bottom: 40px;
    }

    #CarWrapper {
        position: fixed;
        z-index: 100;
        top: 110px;
        left: 1rem;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0px 0px 20px 0px gray;
    }
</style>
@endpush

@section('content')
 <div class="d-flex pt-160 pb-40 overflow-auto">
    <div id="Garage" class="m-auto position-relative" ondrop="drop(event)" ondragover="allowDrop(event)">
      <img src="{{ asset('/assets/img/FordGFv3.png') }}" alt="Ford GF" id="BgImg" />
    </div>
  </div>
  <div id="CarWrapper">
    <img src="{{ asset('/assets/img/Car.png') }}"
        width="30" height="54"
        ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="Car" />
  </div>
  <script>
    let valetData = {};
    const socket = new WebSocket("ws://localhost:9001");

    socket.addEventListener("open", (event) => {
      console.log("Connected to server");
      sendMessage({ action: "init" });
    });

    socket.addEventListener("message", (event) => {
      const obj = JSON.parse(event.data);
      switch (obj.action) {
        case "init":
          valetData = obj.data.reduce(
            (a, item) => ({ ...a, [item.id]: item }),
            {}
          );
          renderInit();
          break;
        case "add":
        case "move":
          const { trId: mTrId, elId: mElId } = obj.data;
          const prevTargetId = getTargetIdByElId(mElId);
          if (prevTargetId) {
            valetData[prevTargetId] = { ...valetData[prevTargetId], e: null };
          }
          valetData[mTrId] = { ...valetData[mTrId], e: mElId };
          renderMove(obj.data);
          break;
        case "remove":
          const { elId: rElId } = obj.data;
          const targId = getTargetIdByElId(rElId);
          if (targId) {
            valetData[targId] = { ...valetData[targId], e: null }
          }
          removeEl(obj.data);
        default:
          break;
      }
    });

    socket.addEventListener("close", (event) => {
      window.alert("Disconnected from server")
    });

    socket.addEventListener("error", (event) => {
      console.error(`Error: ${event}`);
    });

    function sendMessage(message) {
      socket.send(JSON.stringify(message));
    }

    const BgImgEl = document.getElementById("BgImg");
    const GarageEl = document.getElementById("Garage");
    const CarEl = document.getElementById("Car");
    const CarWrapperEl = document.getElementById("CarWrapper");

    const DX = Math.round(CarEl.width / 2);
    const DY = Math.round(CarEl.height / 2);

    function dragStart(event) {
      event.dataTransfer.setData("ElId", event.target.id);
      event.dataTransfer.setData("TrId", getTargetIdByElId(event.target.id.replace("Car", "")));
    }

    function dragging(event) { }

    function allowDrop(event) {
      event.preventDefault();
    }

    function drop(event) {
      event.preventDefault();
      if (!isValidPosition(event)) return;
      const id = event.dataTransfer.getData("ElId");
      const trId = event.dataTransfer.getData("TrId");
      let el = document.getElementById(id);
      let action = "move";
      if (isActionAdd(id)) {
        action = "add";
        generateNewDragItem();
        el.id += Object.values(valetData).reduce((s, { e }) => s = Math.max(s, e), 1) + 1;
      }
      el.style.position = "absolute";
      const { x, y, w, h } = valetData[getTargetId(event)];

      if (w > h) el.style.transform = "rotate(90deg)";
      else el.style.transform = null;

      el.style.left = x + w / 2 - DX + "px";
      el.style.top = y + h / 2 - DY + "px";

      GarageEl.appendChild(el);
      sendMessage({
        action,
        data: { trId: getTargetId(event), elId: el.id.replace("Car", "") },
      });
    }

    function isActionAdd(id) {
      return id === "Car";
    }

    function generateNewDragItem() {
      const el = document.createElement(CarEl.tagName);
      el.src = CarEl.src;
      el.ondragstart = CarEl.ondragstart;
      el.ondrag = CarEl.ondrag;
      el.ondrag = CarEl.ondrag;
      el.draggable = CarEl.draggable;
      el.id = "Car";
      CarWrapperEl.appendChild(el);
    }

    function isValidPosition(event) {
      const targetId = getTargetId(event);
      if (!!targetId) {
        const { x, y, w, h, e } = valetData[targetId];
        if (
          event.offsetX > x &&
          event.offsetX < x + w &&
          event.offsetY > y &&
          event.offsetY < y + h &&
          !e
        )
          return true;
      }
      return false;
    }

    function getTargetIdByElId(elId) {
      const arr = Object.values(valetData).filter(
        ({ e }) =>
          e == elId
      );
      if (arr.length === 1) return arr[0].id;
      return false;
    }

    function getTargetId(event) {
      const arr = Object.values(valetData).filter(
        ({ id, x, y, w, h, e }) =>
          event.offsetX > x &&
          event.offsetX < x + w &&
          event.offsetY > y &&
          event.offsetY < y + h
      );
      if (arr.length === 1) return arr[0].id;
      return false;
    }

    function renderInit() {
      Object.values(valetData)
        .filter(({ e }) => !!e)
        .forEach(({ id, x, y, w, h, e }) => {
          const el = document.createElement(CarEl.tagName);
          el.src = CarEl.src;
          el.ondragstart = CarEl.ondragstart;
          el.ondrag = CarEl.ondrag;
          el.ondrag = CarEl.ondrag;
          el.draggable = CarEl.draggable;
          el.ondblclick = (e) => {
            e.preventDefault()
            const result = window.confirm("Do you want to remove?");

            if (result) {
              sendMessage({
                action: 'remove',
                data: { elId: e.target.id.replace("Car", "") }
              })
            } else {
              console.log("User clicked Cancel");
            }
          }

          el.id = "Car" + e;
          el.style.position = "absolute";
          if (w > h) el.style.transform = "rotate(90deg)"
          el.style.left = x + w / 2 - DX + "px";
          el.style.top = y + h / 2 - DY + "px";
          GarageEl.appendChild(el);
        });
    }

    function renderMove({ elId, trId }) {
      const el = document.getElementById("Car" + elId);
      const { x, y, w, h } = valetData[trId];
      if (w > h) el.style.transform = "rotate(90deg)"
      el.style.left = x + w / 2 - DX + "px";
      el.style.top = y + h / 2 - DY + "px";
    }

    function removeEl({ elId }) {
      const el = document.getElementById("Car" + elId);
      el.remove();
    }

  </script>

@endsection