import {Component, EventEmitter, Input, OnInit, Output, ViewChild} from '@angular/core';
import {MatPaginator, MatSort, MatTableDataSource} from '@angular/material';
import {Room} from '../../../bookings/models/room.model';

@Component({
  selector: 'brme-rooms-list',
  templateUrl: './rooms-list.component.html',
  styleUrls: ['./rooms-list.component.scss']
})
export class RoomsListComponent implements OnInit {
  _rooms;
  @Input()
  set rooms (rooms) {
    this._rooms = rooms;
    this.dataSource.data = rooms;
    this.dataSource.sort = this.sort;
    this.dataSource.paginator = this.paginator;
  }

  get rooms() {return this._rooms; }

  @Input()
  set filter(search: string) {
    this.dataSource.filter = search;
  }
  @Output() deleted = new EventEmitter<number>();
  @Output() selected = new EventEmitter<number>();
  @ViewChild(MatSort) sort: MatSort;
  @ViewChild(MatPaginator) paginator: MatPaginator;
  dataSource = new MatTableDataSource();

  displayedColumns: string[] = ['name', 'put', 'delete'];


  delete(room: Room) {
    if ( confirm('Vous vous apprêtez à supprimer la salle ' + room.name + '.\n' +
      'Continuer ?') ) {
      this.deleted.emit(room.id);
    }
  }

  select(id: number) {
    this.selected.emit(id);
  }

  ngOnInit(): void {

  }
}

