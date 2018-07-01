export class Step{

  private _name;
  private _minValue;
  private _maxValue;
  private _bgColor;
  private _svg

  constructor(name, minValue, maxValue, bgColor, svg) {
    this._name = name;
    this._minValue = minValue;
    this._maxValue = maxValue;
    this._bgColor = bgColor;
    this._svg = svg;
  }

  getWidth(rank){
    if (rank <= this._minValue) {
      return {'width' : '0%'};
    } else if (rank >= this._maxValue){
      return {'width' : '100%'};
    } else {
      return {'width' : '' + Math.floor((rank - this._minValue) * 100 / (this._maxValue - this._minValue)) + '%'};
    }
  }

  labelBg(rank, bgColor){
    if (rank >= this._maxValue) {
      return bgColor;
    } else {
      return '';
    }
  }


  get name() {
    return this._name;
  }

  set name(value) {
    this._name = value;
  }

  get minValue() {
    return this._minValue;
  }

  set minValue(value) {
    this._minValue = value;
  }

  get maxValue() {
    return this._maxValue;
  }

  set maxValue(value) {
    this._maxValue = value;
  }

  get bgColor() {
    return this._bgColor;
  }

  set bgColor(value) {
    this._bgColor = value;
  }

  get svg() {
    return this._svg;
  }

  set svg(value) {
    this._svg = value;
  }
}
