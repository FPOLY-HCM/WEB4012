<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use MarkSitko\LaravelUnsplash\Facades\Unsplash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::query()->truncate();

        $categoriesCount = Category::query()->count();
        $usersCount = User::query()->count();

        $posts = [
            '10 Cách để Nâng cao Sức khỏe của Bạn',
            'Hướng dẫn Điều chỉnh Camera để Chụp Ảnh Chuyên nghiệp',
            'Những Bộ Phim Hay Nhất Năm 2023',
            'Khám phá 10 Địa điểm Du lịch Hấp dẫn tại Châu Âu',
            'Cách làm Món Ăn Truyền thống của Đông Nam Á',
            'Phân Tích Sự phát triển Các Xu hướng Thời trang Mới',
            'Chăm sóc Trẻ em và Xây dựng Mối quan hệ Gia đình Mạnh mẽ',
            'Những Kỹ thuật tập luyện Hiệu quả cho Vận động viên',
            'Văn hóa và Nghệ thuật: Những Điểm nhấn của Triển lãm Nghệ thuật',
            '10 Bước Quan trọng để Đầu tư Tài chính Thông minh',
            'Những Thay đổi Lối sống để Cải thiện Sức khỏe và Hạnh phúc',
            'Hướng dẫn Lựa chọn Trường Đại học và Các ngành Học phù hợp',
            'Xe hơi Điện và Tương lai Giao thông Bền vững',
            'Bí quyết thành công trong Công việc và Xây dựng Sự nghiệp',
            'Nhìn lại Các Sự kiện Quan trọng trong Xã hội và Văn hóa',
            'Những Động vật Hoang dã Độc đáo trên Thế giới',
            '15 Mẹo và Thủ thuật Đơn giản giúp Tiết kiệm Thời gian và Năng lượng',
            'Những Xu hướng Công nghệ Thông tin đáng chú ý',
            'Top 10 Trò chơi Video Đáng chơi trong Năm 2023',
            '7 Cách để Giữ Gìn Sức khỏe Tâm lý Trong Cuộc sống Hối hả',
            'Phong cách Đời sống: Hướng dẫn Lựa chọn Đồ nội thất Phù hợp',
            'Những Bộ phim Kinh dị Hay Nhất để Xem trong Đêm Halloween',
            'Cách Làm Mỹ phẩm Tự nhiên tại Nhà',
            'Tuyển chọn Những Ca khúc Ballad Lãng mạn để Nghe trong Mưa',
            'Bí quyết Giảm căng thẳng và Thư giãn trong Cuộc sống Bận rộn',
            'Những Công trình Kiến trúc Độc đáo trên Thế giới',
            '10 Sách Hay về Lãnh đạo và Phát triển Bản thân',
            'Khám phá Văn hóa ẩm thực Nhật Bản',
            'Cách Tạo Động lực và Năng lượng tích cực trong Cuộc sống',
            'Những Nguyên tắc Cơ bản của Thiết kế Đồ họa',
            'Cách Phát triển Kỹ năng Giao tiếp Hiệu quả',
            'Làm thế nào để Bắt đầu Kinh doanh Trực tuyến thành công',
            'Phân loại và Phân tích Loại hình Nghệ thuật Đương đại',
            'Cách Tăng cường Sự sáng tạo trong Công việc và Cuộc sống',
            'Khám phá Các Công viên Quốc gia nổi tiếng trên Thế giới',
            'Hướng dẫn Cách Xây dựng Một Ứng dụng Di động',
            '10 Mẹo Quản lý Thời gian để Làm việc Hiệu quả',
            'Bí quyết Đạt được Cân bằng Giữa Công việc và Cuộc sống',
            'Cách Phát triển Kỹ năng Viết sáng tạo',
            'Những Lễ hội Nổi tiếng và Độc đáo trên Thế giới',
            '10 Sách Kinh điển mà Mọi Người nên Đọc ít nhất một lần',
            'Tự tin và Tự yêu bản thân: Bước đầu hướng tới Hạnh phúc',
            '10 Địa điểm Du lịch Thú vị tại Châu Phi',
            'Cách Phòng tránh Các Sai lầm Thường gặp trong Đầu tư Tài chính',
            'Hướng dẫn Thiết kế Website Đẹp và Thân thiện người dùng',
            'Cách Lập kế hoạch Tài chính cho Tương lai',
            'Bí quyết Pha chế Đồ uống Thơm ngon tại Nhà',
            'Phân tích Xu hướng Thời trang Thu Đông năm nay',
            'Khám phá 10 Địa điểm Du lịch Hấp dẫn tại Châu Mỹ',
            'Làm thế nào để Đạt được Hiệu suất Cao trong Công việc',
            'Những Bộ phim Hành động Hấp dẫn trong Lịch sử điện ảnh',
            'Bí quyết Dinh dưỡng và Tập luyện cho Sức khỏe Tốt nhất',
            'Những Điểm đến Phượt Nổi tiếng tại Châu Á',
            'Cách Phát triển Kỹ năng Lãnh đạo và Điều hành nhóm',
            'Hướng dẫn Lựa chọn Đồ trang sức Phù hợp với Phong cách',
            'Tự nhiên và Hòa bình: Những Công viên Quốc gia Ấn tượng',
            '10 Bước để Xây dựng Một Mô hình Kinh doanh Thành công',
            'Cách Thiết kế Bộ nhận diện Thương hiệu Độc đáo',
            'Những Công cụ Kỹ thuật số Đắc lực cho Marketer',
            'Hướng dẫn Lựa chọn Đồ dùng Trẻ em An toàn và Phát triển',
            'Cách Phát triển Kỹ năng Đọc hiểu và Tóm tắt Nhanh chóng',
            'Những Bộ phim Hoạt hình Gia đình Hay nhất để Xem cùng Con',
            'Chăm sóc Sức khỏe Tâm lý và Đối phó với Stress',
            'Khám phá 10 Địa điểm Du lịch Hấp dẫn tại Châu Úc',
            'Cách Phát triển Kỹ năng Nghệ thuật Cắm Hoa',
            'Bí quyết Phát triển Kỹ năng Thuyết trình Hiệu quả',
            'Tư duy Kinh doanh và Phân tích Các mô hình Kinh doanh',
            'Những Trò chơi Điện tử Kinh điển mà Mọi người yêu thích',
            'Làm thế nào để Xây dựng Mối quan hệ Tình cảm Lâu dài',
            '10 Địa điểm Du lịch Đẹp nhất tại Châu Đại Dương',
            'Cách Xây dựng Một Blog Thành công từ Đầu',
            'Những Bộ phim Tình cảm Lãng mạn để Xem cùng Đối tác',
            'Bí quyết Tập luyện và Quản lý Thể lực Hiệu quả',
            'Những Điểm du lịch Phổ biến tại Châu Phi',
            'Cách Phát triển Kỹ năng Sáng tạo trong Lĩnh vực Khoa học',
            'Hướng dẫn Lựa chọn Thời trang Phù hợp với Hình dáng Cơ thể',
            'Tự nhiên và Phiêu lưu: 10 Khu vực Thú vị để Khám phá',
            '10 Sách Tự phát Triển và Sách Hay về Tâm lý Học',
            'Cách Xây dựng Một Trang web Thương mại Điện tử thành công',
            'Những Công cụ Kỹ thuật số Hữu ích cho Nhà thiết kế Đồ họa',
            'Hướng dẫn Lựa chọn Đồ chơi Phù hợp với Sự phát triển Trẻ em',
            'Cách Phát triển Kỹ năng Tư duy Sáng tạo',
            'Những Bộ phim Hài Hước Hay nhất để Xem trong Cuộc sống Hối hả',
            'Khám phá 10 Địa điểm Du lịch Hấp dẫn tại Châu Á',
            'Làm thế nào để Đạt được Cân bằng Giữa Công việc và Gia đình',
            'Bí quyết Lựa chọn Các Kỹ năng Tài chính Cá nhân Cần biết',
            'Hướng dẫn Thiết kế Website Tối giản và Hiện đại',
            'Cách Xây dựng Một Mô hình Kinh doanh Online thành công',
            'Những Ca khúc Bất hủ của Nhạc sĩ Nổi tiếng',
            '10 Địa điểm Du lịch Hấp dẫn tại Châu Phi',
            'Cách Phát triển Kỹ năng Chụp Ảnh Chân dung Chuyên nghiệp',
            'Bí quyết Xây dựng Mối quan hệ Gia đình Mạnh mẽ và Hạnh phúc',
            'Những Bộ phim Hoạt hình Kinh điển để Xem cùng Con',
            'Cách Chăm sóc Sức khỏe Tâm lý trong Cuộc sống Hối hả',
            'Khám phá 10 Địa điểm Du lịch Hấp dẫn tại Châu Mỹ Latinh',
            'Hướng dẫn Lựa chọn Đồ trang điểm Phù hợp với Tông màu da',
            'Tự nhiên và Sắc đẹp: Những Địa điểm Nổi tiếng tại Châu Á',
            '10 Sách Kỹ năng Sống mà Mọi Người nên Đọc ít nhất một lần',
            'Cách Tạo Thói quen Tích cực và Loại bỏ Thói quen Tiêu cực',
            'Bí quyết Xây dựng Một Mạng lưới Xã hội thành công',
            'Những Trò chơi Mô phỏng Đáng chơi trong Thế giới Ảo',
        ];

        $images = collect();

        foreach (range(1, 4) as $ignored) {
            $data = Unsplash::randomPhoto()
                ->orientation('landscape')
                ->term('people')
                ->randomPhoto()
                ->perPage(100)
                ->count(100)
                ->quantity(1000)
                ->toCollection();

            $images->push($data->pluck('urls.regular'));
        }

        $images = $images->flatten();

        foreach ($posts as $title) {
            Post::query()->create([
                'category_id' => rand(1, $categoriesCount),
                'author_id' => rand(1, $usersCount),
                'title' => $title,
                'slug' => Str::slug($title),
                'views' => rand(10, 10000),
                'thumbnail' => $images->random(),
                'content' => File::get(database_path(sprintf('seeders/posts/post-%s.md', rand(1, 5)))),
                'is_featured' => fake()->boolean(),
                'status' => PostStatus::Published,
            ]);
        }
    }
}
