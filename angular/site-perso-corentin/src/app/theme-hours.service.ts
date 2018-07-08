import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ThemeHoursService {
  private _sunrise = 6;
  private _sunset = 20;
  constructor() { }

  get sunrise(): number {
    return this._sunrise;
  }

  set sunrise(value: number) {
    this._sunrise = value;
  }


  get sunset(): number {
    return this._sunset;
  }

  set sunset(value: number) {
    this._sunset = value;
  }
}
