import { Component, OnInit } from '@angular/core';
import {DateService} from '../../../core/services/date.service';
import {getLastMonday, getNextMonday} from '../../reducers';

@Component({
  selector: 'brme-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  constructor(private dateService: DateService) { }

  ngOnInit() {
  }

}
