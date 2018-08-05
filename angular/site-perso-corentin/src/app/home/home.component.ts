import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS} from '../core/animations/route.animations';



@Component({
  selector: 'spc-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  @ViewChild('top') top: ElementRef;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  constructor() {}

  ngOnInit() {
    this.top.nativeElement.scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  }

}
