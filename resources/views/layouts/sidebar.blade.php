<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a href="/" aria-expanded="false"><i class="icon icon-globe-2"></i>
                    <span class="nav-text">Dashboard</span></a>
            </li>
            <li>
                <div class="quixnav">
                    <div class="quixnav-scroll">
                        <ul class="metismenu" id="menu">
                            <li class="nav-label first">Main Menu</li>
                            <li><a href="/" aria-expanded="false"><i class="bi bi-houses-fill"></i><span class="nav-text">Dashboard</span></a>
                            </li>
                            <li class="nav-label">Apps</li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-book-fill"></i><span class="nav-text">buku</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/databuku"> data buku</a></li>
                                    <!-- <li><a href="/editbuku"> edit buku</a></li> -->
                                    @if (Auth::user()->role == 'admin')
                                    <li><a href="./kategoribuku">kategori buku</a></li>
                                    @endif
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-people-fill"></i><span class="nav-text">peminjam</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="/anggota">peminjam</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-people-fill"></i><span class="nav-text">anggota</span></a>
                            @if (Auth::user()->role == 'admin')
                            <ul aria-expanded="false">
                                    <li><a href="/user">Anggota</a></li>
                                </ul>
                                @endif
                                <ul aria-expanded="false">
                                    <li><a href="/profile">profile</a></li>
                                </ul>
                            </li>
                            <li><a onClick="return confirm('apaka anda yakin ingin menghapus?')"
                                href="/logout"
                                class="btn text-black">Logout</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
